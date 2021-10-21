<?php

namespace App\Http\Controllers;
use App\Classes\thawani;
use Illuminate\Http\Request;
use Session;
use App\Order;
use App\BusinessSetting;
use App\Student;
use App\Studentpain;
use Illuminate\Support\Facades\Auth;

class Mwallehthwani extends Controller
{
    public function thawani(Request $request){
       
    $is_test =    0;    // dd($is_test);
    if($is_test == 1){
        $thawani = new thawani([  
            'isTestMode' => 1, ## set it to 0 to use the class in production mode  
            'public_key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',  
            'private_key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',  
          ]);
         
        }else{
            $thawani = new thawani([  
                'isTestMode' => 0, ## set it to 0 to use the class in production mode  
                'public_key' => 'uaJCtsXvGCGegyPngAUXh9L9b6uLTE',  
                'private_key' => 'P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL',  
              ]);
              
        }
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
                $student->session_id = $thawani->responseData['data']['session_id'];
                $student->save();
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
    public function father_paid(Request $request,$student){
        $is_test =    0;    // dd($is_test);
        if($is_test == 1){
            $thawani = new thawani([  
                'isTestMode' => 1, ## set it to 0 to use the class in production mode  
                'public_key' => 'HGvTMLDssJghr9tlN9gr4DVYt0qyBy',  
                'private_key' => 'rRQ26GcsZzoEhbrP2HZvLYDbn9C9et',  
              ]);
             
            }else{
                $thawani = new thawani([  
                    'isTestMode' => 0, ## set it to 0 to use the class in production mode  
                    'public_key' => 'uaJCtsXvGCGegyPngAUXh9L9b6uLTE',  
                    'private_key' => 'P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL',  
                  ]);
                  
            }
    
           
                $qu =1;
             
     
                  $total = 0;
            session()->get('array_paid');
            foreach($request->piad as $p){
                $pr= Studentpain::find($p)->amount;
                $total += $pr;
            }
                $amount =$total  * 1000;
             
         
                
              $request->op = !isset($request->op)? '' :$request->op; ## to avoid PHP notice message
              switch ($request->op){
                  default: ## Generate payment URL
                      $orderId = rand(2,50); ## order number based on your existing system
                      $input = [
                          'client_reference_id' => rand(1000, 9999).$orderId, ## generating random 4 digits prefix to make sure there will be no duplicate ID error
                          'products' => [
       
                              ['name' => 'Register Student in '. env('APP_NAME'), 'unit_amount' => $amount, 'quantity' => 1],
                          ],
              //            'customer_id' => 'cus_xxxxxxxxxxxxxxx', ## TODO: enable this when its activate from Thawani Side
             'success_url' => route('thawani.father.done',$student), ## Put the link to next a page with the method checkPaymentStatus()
                  'cancel_url' => route('thawani.father.cancel',$student), 
                          
                          'metadata' => [
                              'order_id' => 1,
                              'customer_name' => Auth::User()->name,
                              'customer_phone' =>  Auth::User()->phone,
                              'customer_email' =>  Auth::User()->email,
                          ]
                      ];
                      $url = $thawani->generatePaymentUrl($input);
                      echo '<pre dir="ltr">' . print_r($thawani->responseData, true) . '</pre>';
                      $request->session()->put($_SERVER['REMOTE_ADDR'],$thawani->payment_id);
                                  session()->put('father_paid_session', $thawani->responseData['data']['session_id']);
                 foreach($request->piad as $p){
                                         $sss= Studentpain::find($p);
                                          $sss->session_id = $thawani->responseData['data']['session_id'];
                                          $sss->save();
                                        }
    
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
         
            // flash(translate('error Occer'))->error();
            return redirect()->back()->withInput();
        }
        public function successUrl(){
            // $checkoutController = new CheckoutController;
            // $payment = 'thwani';
           
           Order::create([
               'student_id'=>session()->get('student_id'),
               'amount'=> Student::find(session()->get('student_id'))->fist_q,
           ]);
        $s =   Student::find(session()->get('student_id'));
        $s->paid = 1;
        $s->save();
        session()->forget('step1');
        session()->forget('step2');
        session()->forget('step3');
        session()->forget('step4');
         session()->flush();
     session()->put('modalll', 'true');
      
         
          
            
        }
}
