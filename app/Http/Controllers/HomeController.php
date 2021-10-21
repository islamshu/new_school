<?php

namespace App\Http\Controllers;

use App\About;
use App\About_2;
use App\Config;
use App\Service;
use App\Study;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Branch;
use App\Price;
use App\Stage;
use Session;
use App\General;
use App\Student;
use Auth;
use App\Admin;
use App\Father;
use App\Notification;
use DB;
use App\Slider;
use Response;
use App\Http\Controllers\ThawaniController;
use GuzzleHttp\Client as GuzzleClient;
use App\Jobs\Verfy;
use App\Studentpain;
use App\Order;

use Illuminate\Contracts\Validation\Validator;

// use Illuminate\Contracts\Session\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function loign_to_father($id){
         $user = Father::find($id);
         Auth::guard('father')->login($user, true);
       return redirect()->route('father_dashboard');
     }
      public function get_fathers(){
        return view('dashboard.fathers.index')->with('fathers',Father::get());
     }
    public function index()
    {
      
       $students = Student::where('paid',1)->with('pils')->get();
        foreach($students as $s){
            $date = '28-9-2021';
            foreach($s->pils as $key => $bb){
                    if($key == 0){
                        $bb->payment_date = $s->created_at;
                        $bb->stage = $key +1;
                        
                        $bb->save();
                    }else{
                          $bb->stage = $key +1;
                           $bb->payment_date=  Carbon::parse($date)->addMonths($key -1);
                           $bb->save();
                    }
            }
        }
        dd('aa');
        $sts = Student::where('father_id','!=',null)->where('paid',1)->get();
        $coo = collect($sts)->unique('father_id');
        dd($coo);
        dd('dddd');
        

        foreach($sts as $st){
            $total_paid = $st->total_paid;
            $total_remain = $st->total -$total_paid; 
        for($int =1 ; $int < 10 ;$int++){
            if($int == 1){
                $new = new Studentpain();
                $new->student_id = $st->id;
                $new->payment_date=  Carbon::parse(General::first()->study_date);
                $new->amount = $total_paid ;
                $new->status=1;
                $new->save();  
            }
            $part = $total_remain / 9;
            $new = new Studentpain();
            $new->student_id = $st->id;
            $new->payment_date=  Carbon::parse(General::first()->study_date)->addMonths($int);
            $new->amount=$part;
            $new->status=0;
            $new->save();
        }
        $order = new Order();
        $order->student_id  = $st->id;
        $order->amount =$st->total_paid;
        $order->total_remain= $total_remain;
        $order->total_paid = $total_paid;
        $order->code = date('Ymd-His').rand(1,6);
        $order->father_id = $st->father_id;
        $order->months = json_encode([Carbon::parse(General::first()->study_date)->addDays(25)]);
        $order->save();
        }
        dd('ddd');
        foreach($st->unique('father_id') as $ss){
            $father = new Father();
            $father->name =$ss->father_name;
            $father->father_id = $ss->father_id;
            $father->email = $ss->father_email;
            $father->phone = $ss->father_phone;
            $father->password = bcrypt($father->father_id);
            $father->save();
        }
    
        return view('fronts.index')
        ->with('config',Config::first())
        ->with('slider',Slider::where('status',1)->take(3)->get())
        ->with('about',About::first())
        ->with('about2',About_2::first())
        ->with('service',Service::where('status',1)->take(6)->get())
        ->with('study',Study::where('status',1)->take(6)->get())
        ;
    }
         public function chech_paid(){
         $student = Student::where('session_id','checkout_OFpCPETWsEd6IrFt5EnM7N8Hwxlbg3wM930GgyQ0jkKmGTMzkq')->first();
        
        $session_id = 'checkout_OFpCPETWsEd6IrFt5EnM7N8Hwxlbg3wM930GgyQ0jkKmGTMzkq';
       
        $headers = [
              'Authorization' => 'Bearer token',
              'thawani-api-key'=>'5rfXU0xBMo0dz0dFujbuTJaNxeAnkf'
          ];
        $client=   new \GuzzleHttp\Client([
              'headers' => $headers
          ]);
       
          $r = $client->request('get', 'https://checkout.thawani.om/api/v1/checkout/session/'.$session_id);
      $response = $r->getBody()->getContents();
      $array = json_decode($response, true);
       if($array['data']['payment_status'] == 'paid'){
           dd($student);
            if($student->paid != 1){
                $student->session_id = '0'.$student->session_id;
                $student->paid = 1;
                $student->total_paid = $student->fist_q;
                $student->total_remain = $student->total - $student->fist_q;
                  $fath = Father::where('father_id',$student->father_id)->first();
        if(!$fath ){
        $father = new Father();
            $father->name =$student->father_name;
            $father->father_id = $student->father_id;
            $father->email = $student->father_email;
            $father->phone = $student->father_phone;
            $father->password = bcrypt($father->father_id);
            $father->save();
        }
                $student->save();
                for($int =1 ; $int < 10 ;$int ++){
                    if($int == 1){
                        $new = new Studentpain();
                        $new->student_id = $student->id;
                        $new->payment_date=  Carbon::parse(General::first()->study_date)->addDays(24);
                        $new->amount = $student->fist_q;
                        $new->status=1;
                        $new->save();  
                       continue;
                    }else{
                    $da = new Studentpain();
                    $da->student_id =$student->id;
                    $da->payment_date=  Carbon::parse(General::first()->study_date)->addDays(24)->addMonths($int - 1);
                    $da->amount=$student->month_p;
                    $da->status=0;
                    $da->save();
              
                }
                }
                $order = new Order();
                $order->student_id  = session()->get('student_id');
                $order->amount =  $student->fist_q;
                $order->father_id = session()->get('step2')['father_id'];
                $order->code = date('Ymd-His').rand(1,6);
                $order->months = json_encode([Carbon::parse(General::first()->study_date)->addDays(25)]);
               $order->total_paid =  $order->amount;
            $order->total_remain = $student->total - $student->fist_q;   
            $order->session_id  =$student->session_id;
        
            $order->save();
  
                }
                   


       }
     }
    public function croun_job(){
        $student= Student::where('session_id', 'not like', "0%") ->chunk(50, function($data) {
            
        dispatch(new Verfy($data));
        });
        
    return 'data well change in background';
    }
    public function post(array $parameters, $method = 'POST'){
        $output = ['is_success' => 0, 'response' => ''];
        $parameters = array_merge([
            'url' => '',
            'settings' => [],
            'fields' => [],
            'headers' => [],
            'printHeader' => false,
            'skipSSL' => false,
        ], $parameters);
        if(!is_array($parameters['fields'])) $parameters['fields'] = [];
        $fields_string = '';
        $fieldsCount = count($parameters['fields']);
        if($fieldsCount > 0){ $fields_string = json_encode($parameters['fields']); }
        $parameters['headers'] = array_merge(['content-type' => 'application/json'], $parameters['headers']);
        $headers = array_map(function($v, $k){ return $k.': '.$v; }, $parameters['headers'], array_keys($parameters['headers']));
       $settings = [
            CURLOPT_URL => $parameters['url'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT =>  30,
            CURLOPT_CONNECTTIMEOUT =>  30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers,
        ];
        if($method == 'GET'){
            if($fieldsCount > 0){
                $settings[CURLOPT_URL] = $parameters['url'].http_build_query($parameters['fields']);
            }
        }else{
            $settings[CURLOPT_POST] = $fieldsCount;
            $settings[CURLOPT_POSTFIELDS] = $fields_string;
        }
        foreach($parameters['settings'] as $cons => $value){
            $settings[$cons] = $value;
        }
        $settings[CURLOPT_HEADER] = $parameters['printHeader']? 1 : 0;
        $settings[CURLOPT_SSL_VERIFYPEER] = $parameters['skipSSL']? 1 : 0;
        $connection = curl_init();
        $this->connection = $connection;
        curl_setopt_array($connection, $settings);
        $content = curl_exec($connection);
        $err = curl_error($connection);
        if($parameters['printHeader']){
            preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $content, $matches);
            $this->headerCookies = array();
            foreach($matches[1] as $item) {
                parse_str($item, $cookie);
                $this->headerCookies = array_merge($this->headerCookies, $cookie);
            }
            $header_len = curl_getinfo($connection, CURLINFO_HEADER_SIZE);
            $this->headerResponses = substr($content, 0, $header_len);
            $content = substr($content, $header_len);
        }
        curl_close($connection);
        if(!$err){
            $output['is_success'] = 1;
            $output['response'] = $content;
        }else{
            $output['response'] = $err;
        }
        return $output;
    }
    public function remove(){
        $today_start = '2021-03-30 17:34:45';
        $today_end = '2021-05-24 23:59:59';
        $sudents = Student::count();
// return Response::json($sudents);
dd($sudents);
        
    }
    public function price(Request $request){
        $years = Carbon::parse($request->student_date)->age;
        dd($years);
    }
    public function cal(Request $request){
        $daa = General::first()->study_date;
       $data = $daa.' 00:00:00';
        $years =   \Carbon\Carbon::parse($request->date)->diff($data )->format('%y');
   $mo =   \Carbon\Carbon::parse($request->date)->diff($data )->format('%m');

        

        if (request()->ajax()) {
            if (request()->has('date')) {
             $sss = $years. ' سنوات و ' . $mo .' شهر';
                $dd= session()->put('state_age', $years);
                $form = '   
                 <input type="text" hidden id="yeasrsss" disabled value="'.$years.'" placeholder="العمر" >

                <input type="text" name="age_start" disabled value="'.$sss.'" placeholder="العمر" >';
                


          return $form;
      
              }
            }
    }
    public function branch(Request $request){
    
         $daa = General::first()->study_date;
       $data = $daa.' 00:00:00';
         $years =   \Carbon\Carbon::parse($request->date)->diff($data )->format('%y');
         if (request()->ajax()) {
             if (request()->has('date')) {
                 if($years < 6){
              $branch = Branch::where('id','!=',10)->get();

                    $form =  '<option value="" disabled selected>يرجى اختيار الفرع </option>';
            //         <div class="language-select">
            //     <select name="branch" class="branches" >
            //         <option > يرجى اختيار الفرع</option>
            // ';
            foreach ($branch as $sub) {
                $form = $form .'<option value="' . $sub->id . '"> ' . $sub->title . ' </option>';
            }
                // $form.'</select>'; 
                 }else{
                     $branch = Branch::where('stage','like', '%5%')->get();
                    $form =  '<option value="" disabled selected>يرجى اختيار الفرع </option>';
    
            foreach ($branch as $sub) {
                $form = $form .'<option value="' . $sub->id . '"> ' . $sub->title . ' </option>';
            }
                // $form.'</select>';
                 }
 
   
 
  
 
 
           return $form;
       
               }
             }
     }




     public function stage(Request $request){
         
    
          $daa = General::first()->study_date;
       $data = $daa.' 00:00:00';
         $years =   \Carbon\Carbon::parse($request->date)->diff($data )->format('%y');
         $month = \Carbon\Carbon::parse($request->date)->diff($data )->format('%m');
        
        
        // dd($years);
  
 if($years == 3 ){
     $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="روضة" class="form-control stageee" disabled>'; 
        $stage="روضة";
 }elseif($years == 4){
    $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="تمهيدي" class="form-control stageee" disabled>'; 
        $stage="تمهيدي"; 

}elseif($years == 5  ){
    $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="تجهيزي" class="form-control stageee" disabled>'; 
        $stage="تجهيزي";
}elseif($years == 6){
    $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="صف أول" class="form-control stageee" disabled>'; 
        $stage="صف أول";
}elseif($years == 7){
     $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="صف ثاني" class="form-control stageee" disabled>'; 
        $stage="صف ثاني";
}elseif($years == 8){
    $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="صف ثالث" class="form-control stageee" disabled>'; 
        $stage="صف ثالث";
}elseif($years == 9){
    $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="صف رابع" class="form-control stageee" disabled>'; 
        $stage="صف رابع"; 
}else{
      $form =  '   <i class="zmdi zmdi-flag"></i>
        <input type="text" name="stage" value="لا يوجد" class="form-control stageee" disabled>'; 
        $stage="صف رابع"; 
}
// dd($form);
    
     Session()->put('stage',$stage);
     Session()->get('stage');
     return $form;

       
     }
     public function get_stage(Request $request){
         $branch = $request->branch;
        if($branch == 6 || $branch == 7 ||  $branch == 9 || $branch == 11  ){
            $form = '
            <select name="stage"    required >
            <option value=""  disabled selected>يرجى اختيار المرحلة</option>

            <option value="روضة"  >روضة</option>
          <option value="تمهيدي"  >تمهيدي</option>
            <option value="تجهيزي"  >تجهيزي</option>
            </select>';            

        }else{
            $form = '
            <select name="stage"    required >
                                                
                                                
            <option value="" disabled selected>يرجى اختيار المرحلة</option>
      
              <option value="صف أول"  >صف أول</option>
            <option value="صف ثاني"  >صف ثاني</option>
              <option value="صف ثالث"  >صف ثالث</option>
              </select>
              ';
        }
                    //   <option value="صف رابع"  >صف رابع</option>

        return $form;
     }

     public function parice_test(Request $request){
     $price = Price::where('branch_id',$request->branch)->where('stage_id',$request->stage)->first();
    
    Session()->put('branch',$request->branch);

      $form = ' 
       <div class="form-inner-area">
      <div class="row">
          <div class="col-6" style="text-align: center">
              <label >
             <h3>إجمالي الأقساط :</h3>
              </label>
          </div>
          <div class="col-6">
              <input type="number" name="total" disabled value="'.$price->total.'">
          </div>
      </div>
      
  </div>
  <div class="form-inner-area">
  <div class="row">
      <div class="col-6" style="text-align: center">
          <label >
         <h3>القسط الأول (الملزم دفعه) : </h3>
          </label>
      </div>
      <div class="col-6">
      <input type="number" name="fist_q" disabled value="'.$price->fist_q.'">
      </div>
  </div>';

  return $form;

     }
         public function user_not($userid){
        if(Auth::id() == $userid){

     
        $id = $userid;

      $count =  Notification::where('notifiable_id',Auth::id())->where('read_at',null)->count();

      $user =  Admin::find($id);
   $usernotifcation =    $user->unreadnotifications;


            $resoponse = array(
            'id'=>Auth::id(),
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
     public function register_student(Request $request){
       
    $age_start = $request->session()->get('state_age');
    $total = $request->session()->get('total');
    $fist_q = $request->session()->get('fist_q');
    $stage = $request->session()->get('stage');

// dd($data);
        $request_all = $request->except(['age_start']);
        $request_all['age_start']= $age_start;
        $request_all['total']= $total;
        $request_all['fist_q']= $fist_q;
        $request_all['stage']= $stage;
        // dd($request_all) ;
      $st=   Student::create($request_all);
     if($st){
        $thawani = new ThawaniController;
        // $ddddd= session()->put('student_id', $st->id);
        return $thawani->thawani($request);
     }

      
     }
     
        public function user_not_read(Request $request){
        $id = Auth::id();
        // dd(CarbonImmutable::now());
        $affected = DB::table('notifications')->where('notifiable_id',$id)->update(array('read_at' =>  Carbon::now()));

    }

    public function save_fcm_token(Request $request)
    {
    $errors=NULL;
    $message = "Success";
    $validator = Validator::make($request->all(), [
    'fcm_token' => 'required',
    ],
    [
    'title.fcm_token' => 'fcm token required',
    ]
    );
    if ($validator->fails()) {
    $status = false;
    $errors = $validator->errors();
    $message = " Error !! ";
    }
    $user = auth()->user()->update([
    'fcm_token'=>$request->fcm_token
    ]);

    $status = $user?true:false;
    return response()->json(
    [
    'message'=>$message,
    'status'=>$status,
    'errors'=>$errors,
    'fcm_token'=>$request->fcm_token
    ]
    );
    }

}
