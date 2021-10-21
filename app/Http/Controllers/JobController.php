<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use PDF;
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fronts.form3');
    }
    public function index2()
    {
        return view('dashboard.job.index2')->with('jobs',Job::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    $job =    Job::create($request->all());
    if($job){
        $request->session()->put('modalll22','true');
        return redirect('/');
    }else{
        return redirect()->back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);
        $job->is_show = 1;
        $job->save();
        return view('dashboard.job.show')->with('job',$job);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $job = Job::find($id);

        $job->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();
               return redirect()->back()->with('success','تم الحذف بنجاح');
    }
      public function print($id)
    {
        $job = Job::find($id);

        $data = [
    'id'=> $job->id,
];
    $pdf = PDF::loadView('dashboard.job.pdf', $data);
    return $pdf->stream('document.pdf');
    }
}
