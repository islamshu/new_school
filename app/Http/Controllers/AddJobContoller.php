<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Admin;
use Session;
use App\Notification;
use Auth;
use App\Notifications\JobNoti ;
class AddJobContoller extends Controller
{
     public function store_job(Request $request)
    {
       
    $job =    Job::create($request->all());
    if($job){
         $user = Admin::first();
         $user ->notify(new JobNoti($job));
        
        return redirect()->back()->with('success','تم التسجيل بنجاح');
    }else{
        return redirect()->back();
    }
    }
}
