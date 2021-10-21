<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Http\Request;
use Validator;
class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.general.index')->with('general',General::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $general= General::first();
         $request_all = $request->except(['course_image','skill_logo']);
        if($request->course_image != null){
            $request_all['course_image'] = $request->course_image->store('course_image');

        }
         if($request->skill_logo != null){
            $request_all['skill_logo'] = $request->skill_logo->store('skill_logo');

        }
        
        
        
        $general->update($request_all);
      
            return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
