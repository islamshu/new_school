<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Student;

class OrderVerfy implements ShouldQueue
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
       foreach($this->data as $order){
              $session_id = $order->session_id;
              $student = Student::find($order->student_id);
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
                    $order->paid = 1;
                }
                    $order->session_id = '0'.$student->session_id;
                    $order->save();

       }
    }
}
