<?php

namespace App\Http\Controllers;

use App\Student;
use App\Studentpain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\StudentNo ;
use App\Http\Controllers\Mwallehthwani;
use App\Http\Controllers\EBRYcONTROLLER;
use App\Http\Controllers\ElHayalController;
use App\Http\Controllers\Mabela2;
use App\Order;
use PDF;
use App\Father;
use DB;
use App\Notification;
use Carbon\Carbon;

use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;

class FatherController extends Controller
{
    
             public function user_not($userid){
        if(Auth::guard('father')->id() == $userid){
    
       

        $id = $userid;
     

      $count =  Notification::where('notifiable_id',Auth::id())->where('notifiable_type','App\Father')->where('read_at',null)->count();

      $user =  Father::find($id);
   $usernotifcation =    $user->unreadnotifications;


            $resoponse = array(
            'id'=>Auth::guard('father')->id(),
            'data'=> $usernotifcation,
            'count'=> $count,
            'userinfo'=>$user
            );



    }else{
        $resoponse = array(
            'id'=>'-1',
            'data'=> 'please login',
            'count'=> 0,
            'userinfo'=>0
            );
    } 

echo(json_encode($resoponse));



}
     public function user_not_read(Request $request){
        $id = Auth::guard('father')->id();
        // dd(CarbonImmutable::now());
        $affected = DB::table('notifications')->where('notifiable_id',$id)->where('notifiable_type','App\Father')->update(array('read_at' =>  Carbon::now()));

    }
    
    
    
    public function get_login(){
Auth::guard('father')->logout();
        if(Auth::guard('father')->user() == null){
            return view('auth.father.login');
        }else{
            
            $students = Student::where('father_id',Auth::guard('father')->user()->father_id)->get();
      
            return view('father.index')
            ->with('students',$students)
            ;
        }
    }
    public function dashboard(){
      
        $students = Student::where('father_id',Auth::guard('father')->user()->father_id)->where('paid',1)->get();
        return view('father.index')
        ->with('students',$students)
        ;
    }
    public function logout(){
        Auth::guard('father')->logout();
        return $this->get_login();
    }
    public function post_login(Request $request)
    {

     
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('father')->attempt(['father_id' => $request->father_number, 'password' => $request->password], $request->get('remember'))) {
           
            return redirect()->route('father_dashboard');
        }
  
      
        return redirect()->back()->with(['errorr' => 'الرقم المدني أو كلمة المرور خاطئة']);
    }
    public function all_paids($student_id){
        // dd($student_id);
        $student = Studentpain::where('student_id',$student_id)->get();
        return view('father.paids.index')->with('paids',$student);

    }
    public function test_piad(Request $request){
       
        // $total = 0;
        session()->put('array_paid',$request->piad);
        // foreach($request->piad as $p){
        //     $pr= Studentpain::find($p)->amount;
        //     $total += $pr;
        // }
        $student= Student::find($request->student_id);
        
        if($student->branch == 9 ||  $student->branch == 11){
            $mwalih = new Mwallehthwani;
            return $mwalih->father_paid($request,$student);
        }elseif($student->branch == 6){
            $ebry = new EBRYcONTROLLER;
            return $ebry->father_paid($request,$student);
        }elseif($student->branch == 7){
           
            $ebry = new ElHayalController;
            return $ebry->father_paid($request,$student);
        }elseif($student->branch == 10){
            $ebry = new Mabela2;
            return $ebry->father_paid($request,$student);
        }
        // dd($request);
    }
    public function all_bills(Request $request,$data = null){

  $data = $request->data;
  $ids =[];
  $st = Student::where('student_name','like','%'.$data.'%')->where('father_id',Auth::User()->father_id)->get();
  if($st !='[]'){
      foreach($st as $ste){
          array_push($ids,$ste->id);
      }
  }


         $orders = Order::where('father_id',Auth::User()->father_id);
  if($st !='[]'){ 
      $orders = $orders->whereIn('student_id', $ids);
         }
         elseif ($st == '[]'){
             $orders = $orders->where('code', 'like', '%'.$data.'%');
         }
         else {
             $orders = $orders;
         }
       
         $orders = $orders->orderBy('code','desc')->paginate(15);


        // $orders = Order::where('father_id',Auth::User()->father_id)->get();
        return view('father.all_blills')->with('orders',$orders);
        // return
    }
    public function bills_show($id){
        $order = Order::find($id);
        return view('father.show_bill')->with('order',$order);

    }
    public function student_show($id){
        return view('father.student_show')->with('student',Student::find($id));
    }
    public function change_pass_get(){
        return view('father.change_pass');
    }
    public function change_pass(Request $request){
        // dd('dfd');
        $request->validate([
            // 'currnet_pass'=>'required',
            'new_password'=>'required|min:8',
            'relpay_password'=>'same:new_password'
        ]);
        
        $user = Auth::user();
      
         $user->password =bcrypt($request-> new_password) ;
          $user->show_password = $request-> new_password;
        $user->save();
        return redirect()->back()->with(['success'=>'تم تغير كلمة المرور بنجاح']);
    }
    
         public function print($id)
    {
        $order = Order::find($id);

        $data = [
    'id'=> $order->id,
];
    $pdf = PDF::loadView('father.print_bill', $data);
    return $pdf->stream('document.pdf');
    }
    public function get_restet(){
        return view('father.father_reset_password');
    }
        public function post_restet(Request $request){
            $request->validate([
                'email'=>'required|email'
                ]);
                $email = Father::where('email',$request->email)->first();
                if($email){
                    $email->otp = rand(1,9999);
                    $email->save();
        $array['view'] = 'reset';
        $array['subject'] = 'رمز إعادة تعين كلمة المرور هو  ';
        $array['from'] = env('MAIL_USERNAME');
        
        $array['otp'] =$email->otp;

        Mail::to($request->email)->send(new ResetPassword($array));
        return view('father.father_reset_password_otp');
                }else{
return redirect()->back()->with(['errorr'=>'البريد الإلكتروني غير مستخدم']);
                }
   return redirect()->back()->with(['errorr'=>'هناك خطأ ما حاول مرة اخرى']);
    }
    public function send_otp(Request $request){
        $request->validate([
                'otp'=>'required|numeric',
                'new_password'=>'required',
                'replay_password'=>'required|same:new_password',
                ]); 
                $fa = Father::where('otp',$request->otp)->first();
                $fa->otp = null;
                $fa->password = bcrypt($request-> new_password) ;
                $fa->show_password = $request-> new_password;

                $fa->save();
        return redirect()->route('father.get_login')->with(['success'=>'تم تغير كلمة المرور بنجاح']);
                
    }
}
