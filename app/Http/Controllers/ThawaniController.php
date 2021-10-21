<?php

namespace App\Http\Controllers;
use App\Classes\thawani;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\BusinessSetting;
use App\Father;
use App\General;
use App\Mail\PaidNotification;
use App\Student;
use App\Studentpain;
use Carbon\Carbon;
use App\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\CourseStudent;
use App\Admin;
use App\Notifications\CourseNot ;

class ThawaniController extends Controller
{
    public function thawani(Request $request){
       
    $is_test =     1;
    // dd($is_test);
    if($is_test == 1){
        $thawani = new thawani([  
            'isTestMode' => 1, ## set it to 0 to use the class in production mode  
            'public_key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',  
            'private_key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',  
          ]);
         
        }else{
            $thawani = new thawani([  
                'isTestMode' => 0, ## set it to 0 to use the class in production mode  
                'public_key' => env('thawani_Publishable_key'),  
                'private_key' => env('thawani_Secret_key'),  
              ]);
        }
        // dd( $thawani);
        //   dd( $thawani->config );
        
            //   dd(Session::get('order_id'));
       
       
            $qu =1;
         
        //    dd($qu);
        //    dd(json_decode(json_encode($qu)));
            // $order = Order::findOrFail(Session::get('order_id'));
            $student = Student::find(session()->get('student_id'));

            $amount =  $student->fist_q  * 1000;
         
     
            
          $request->op = !isset($request->op)? '' :$request->op; ## to avoid PHP notice message
          switch ($request->op){
              default: ## Generate payment URL
                  $orderId = Session::get('order_id'); ## order number based on your existing system
                  $input = [
                      'client_reference_id' => rand(1000, 9999).$orderId, ## generating random 4 digits prefix to make sure there will be no duplicate ID error
                      'products' => [
   
                          ['name' => 'Register Student in '. env('APP_NAME'), 'unit_amount' => $amount, 'quantity' => 1],
                      ],
          //            'customer_id' => 'cus_xxxxxxxxxxxxxxx', ## TODO: enable this when its activate from Thawani Side
          'success_url' => route('thawani.done'), ## Put the link to next a page with the method checkPaymentStatus()
          'cancel_url' => route('thawani.cancel'), 
                      
                      'metadata' => [
                          'order_id' => 1,
                          'customer_name' => session()->get('step2')['father_name'],
                          'customer_phone' =>  session()->get('step2')['father_phone'],
                          'customer_email' =>  session()->get('step2')['father_email'],
                      ]
                  ];
                  $url = $thawani->generatePaymentUrl($input);
                  echo '<pre dir="ltr">' . print_r($thawani->responseData, true) . '</pre>';
                  $request->session()->put($_SERVER['REMOTE_ADDR'],$thawani->payment_id);

                  if(!empty($url)){
                      ## method will provide you with a payment id from Thawani, you should save it to your order. You can get it using this: $thawani->payment_id
                      ## header('location: '.$url); ## Redirect to payment page
                    return redirect($url);
                    }
                  break;
              case 'callback': ## handle Thawani callback, you need to update order status in your database or file system, in Thawani V2.0 you need to add a link to this page in Webhooks
                  $result = $thawani->handleCallback(1);
                  /*
                   * $results contain some information, it will be like:
                   * $results = [
                   *  'is_success' => 0 for failed, 1 for successful
                   *  'receipt' => receipt ID, generate for transaction
                   *  'raw' => [ SESSION DATA ]
                   * ];
                   */
                  if($thawani->payment_status == 1){
                      ## successful payment
                  }else{
                      ## failed payment
                  }
                  break;
              case 'checkPayment':
                  $session =$request->session()->get($_SERVER['REMOTE_ADDR']);
             
                  $check = $thawani->checkPaymentStatus($session);
                  dd(  $check);
                  if($thawani->payment_status == 1){
                    ## successful payment
                    echo '<h2>successful payment</h2>';
                }else{
                    ## failed payment
                    echo '<h2>payment failed</h2>';
                }
                $thawani->iprint_r($check);
                break;
            case 'createCustomer':
                $customer = $thawani->createCustomer('me@alrashdi.co');
                $thawani->iprint_r($customer);
                break;
            case 'getCustomer':
                $customer = $thawani->getCustomer('me@alrashdi.co');
                $thawani->iprint_r($customer);
                break;
            case 'deleteCustomer':
                $customer = $thawani->deleteCustomer('cus_xxxxxxxxxxxxxxx');
                $thawani->iprint_r($customer);
                break;
            case 'home':
                echo 'Get payment status from database';
                break;
        }
    }
        
        public function errorUrl(){
         

      
         
          return redirect()->route('front')->with(['error_code', 5]);            
            return redirect()->back()->withInput();
        }
      public function successUrl(){
            // $checkoutController = new CheckoutController;
            // $payment = 'thwani';
           
        //   Order::create([
        //       'student_id'=>session()->get('student_id'),
        //       'amount'=> Student::find(session()->get('student_id'))->fist_q,
        //   ]);s
        $s =   Student::find(session()->get('student_id'));
        $date = Carbon::parse(General::first()->study_date)->addDays(24);
        $fath = Father::where('father_id',$s->father_id)->first();
        if(!$fath ){
        $father = new Father();
            $father->name =$s->father_name;
            $father->father_id = $s->father_id;
            $father->email = $s->father_email;
            $father->phone = $s->father_phone;
            $father->password = bcrypt($father->father_id);
            $father->show_password =$father->father_id;
            $father->save();
        }
        $s->paid = 1;

        $s->save();
        $date = '2021-09-28';
        $data = [
            ['student_id'=>$s->id, 'status'=> 1 , 'amount'=>$s->fist_q,'payment_date'=>$s->created_at,'session_id'=>$s->session_id],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date ),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(1),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(2),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(3),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(4),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(5),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(6),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(7),'session_id'=>0],
            ['student_id'=>$s->id, 'status'=> 0 , 'amount'=>$s->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(8),'session_id'=>0],
        ];
        Studentpain::insert($data); 
        $order = new Order();
        $order->student_id  = session()->get('student_id');
        $order->amount =  $s->fist_q;
        $order->father_id = session()->get('step2')['father_id'];
        $order->code = date('Ymd-His').rand(1,6);
        $order->months = json_encode([Carbon::parse(General::first()->study_date)->addDays(25)]);
         $order->total_paid =  $order->amount;
        $order->total_remain = $s->total - $s->fist_q;   
        $order->session_id  =$s->session_id;

    $order->save();

        
        // dd(session()->get('step2')['father_email']);
        // dd(env('MAIL_USERNAME') );
        $array['view'] = 'paid';
        $array['subject'] = 'تم الدفع بنجاح';
        $array['from'] = env('MAIL_USERNAME');
        
        $array['father_id'] = session()->get('step2')['father_id'];

      
            
    $s->total_paid = $s->fist_q;
    $s->total_remain = $s->total - $s->fist_q;
    $s->save();
    
        Mail::to(session()->get('step2')['father_email'])->send(new PaidNotification($array));

        session()->forget('step1');
        session()->forget('step2');
        session()->forget('step3');
        session()->forget('step4');
      session()->flush();
     session()->put('modalll', 'true');
      
         
          return redirect()->route('front')->with(['error_code', 5]);
          
            
        }
        public function errorfatherUrl($studnet){
            // return redirect()->route('front')->with(['error_code', 5]);            
            return redirect()->back()->with(['errorr','حدث خطأ ما']);
        }
        public function successfatherUrl($id){
            // dd($student);
            $student = Student::find($id);
        $paid=    session()->get('array_paid');
        $total =0;
        $month = [];
            foreach($paid as $p){
                $tot = Studentpain::find($p)->amount;
                $pr= Studentpain::find($p);
                $pr->status = 1;
                $pr->save();
                $total += $tot;
                array_push($month,$pr->payment_date);

            }
          
            $pr->save();

            $order = new Order();
        $order->student_id  =  $id;
        $order->amount =  $total;
        $order->father_id = $student->father_id;
        $order->total_remain= $student->total_remain -$total;
        $order->total_paid =$student->total_paid + $total ;
            $order->code = date('Ymd-His').rand(1,6);
            $order->session_id  =session()->get('father_paid_session'); 

        
        // $order->student_id = $id;

        $order->months = json_encode($month);
      
        $order->save();
          $student->total_paid += $total;
            $student->total_remain -= $total;
            $student->save();
                    session()->forget('father_paid_session');

            return redirect()->route('payments.all_paids',$id)->with(['success'=>'تم الدفع بنجاح']);
        }
        public function register_coures(Request $request,$course){
              $thawani = new thawani([  
            'isTestMode' => 1, ## set it to 0 to use the class in production mode  
            'public_key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',  
            'private_key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',  
          ]);
          $is_test =1;
     $couser_info =Course::find($course->course_id);

            $amount =  $couser_info->price  * 1000;
            // dd($amount);
         
     $couser_title =Course::find($course->course_id)->title;
            
          $request->op = !isset($request->op)? '' :$request->op; ## to avoid PHP notice message
          switch ($request->op){
              default: ## Generate payment URL
                  $orderId = $course->code; ## order number based on your existing system
                  $input = [
                      'client_reference_id' => rand(1000, 9999).$orderId, ## generating random 4 digits prefix to make sure there will be no duplicate ID error
                      'products' => [
   
                          ['name' => 'Register Student in Course  '.$couser_info->title , 'unit_amount' => $amount, 'quantity' => 1],
                      ],
          //            'customer_id' => 'cus_xxxxxxxxxxxxxxx', ## TODO: enable this when its activate from Thawani Side
                      'success_url' => route('course.done',$course), ## Put the link to next a page with the method checkPaymentStatus()
                      'cancel_url' => route('course.cancel'), 
                      
                      'metadata' => [
                          'order_id' => 1,
                          'customer_name' => $course->name,
                          'customer_phone' =>  $course->phone,
                          'customer_email' =>  $course->email,
                      ]
                  ];
                  $url = $thawani->generatePaymentUrl($input);
                  echo '<pre dir="ltr">' . print_r($thawani->responseData, true) . '</pre>';
                  $request->session()->put($_SERVER['REMOTE_ADDR'],$thawani->payment_id);
                  if(    $is_test !=     1){
                  $course->session_id = $thawani->responseData['data']['session_id'];
                  $course->save();
          }
                //   dd($url);

                  if(!empty($url)){
                      ## method will provide you with a payment id from Thawani, you should save it to your order. You can get it using this: $thawani->payment_id
                      ## header('location: '.$url); ## Redirect to payment page
                    return redirect($url);
                                }
                    }
            }
            public function successCoueseUrl($course){
                $co = CourseStudent::find($course);
                $co->paid = 1;
                $co->save();
                                $user = Admin::first();
             $user ->notify(new CourseNot($co));
                return redirect()->route('register_co.index')->with('success','تم إرسال طلبك بنجاح');
            }
            public function errorCoueseUrl(){
                return redirect()->route('register_co.index')->with('error','لم يتم التسجيل بنجاح');
                
            }
    
    
    
}

