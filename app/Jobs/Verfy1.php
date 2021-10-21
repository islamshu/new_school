<?php

namespace App\Jobs;

use App\General;
use App\Order;
use App\Studentpain;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Father;

class Verfy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
     public $data;
    public function __construct($data)
    {
       $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       foreach($this->data as $student){
              $session_id = $student->session_id;
              if($student->branch == 9 ||  $student->branch == 11){
                  $key ='0';
                $key='P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL';
                }elseif($student->branch == 6){
                $key='5rfXU0xBMo0dz0dFujbuTJaNxeAnkf';
                }elseif($student->branch == 7){
                $key='sHckBzBpdRwKyAiv8fl9uqDqIBPZMN';
                }elseif($student->branch == 10){
                $key = 'YVjZX6LrwXMuRT6MNVpO2yFHJetSlE';
                }
              $headers = [
                    'Authorization' => 'Bearer token',
                    'thawani-api-key'=>$key
                ];
              $client=   new \GuzzleHttp\Client([
                    'headers' => $headers
                ]);
             
                $r = $client->request('get', 'https://checkout.thawani.om/api/v1/checkout/session/'.$session_id);
            $response = $r->getBody()->getContents();
            $array = json_decode($response, true);
            if($array['data']['payment_status'] == 'paid'){
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
              $count =Studentpain::where('student_id',$student->id)->count();
              if($count == 0 ){
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
}
}
