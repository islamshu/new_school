<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Student;
use App\Order;
class QueueMangment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refresh';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Student::where('session_id', 'not like', "0%")->get() as $student){
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
                    $student->paid = 1;
                }
                    $student->session_id = '0'.$student->session_id;
                    $student->save();

       }
       foreach(Order::where('session_id', 'not like', "0%")->get() as $order){
                 $session_id = $order->session_id;
              $studen = Student::find($order->student_id);
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
                    $student->paid = 1;
                }
                    $order->session_id = '0'.$student->session_id;
                    $order->save();
       }
       
    }
}
