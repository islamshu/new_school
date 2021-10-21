<?php

namespace App\Http\Controllers;

use App\About;
use Illuminate\Http\Request;
use Validator;
class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.about.index')->with('about',About::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about= About::first();
        $request_all = $request->all();
        
        if($request->image != null){
            $path = $request->image->store('about_image');
            $request_all['image']= $path;
        }
        $validator = Validator::make($request->all(), [
            
            'main_title'=>'required',
            'main_des'=>'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            if($request->title_1 !=null || $request->icon_1 !=null || $request->des_1 !=null){
                $validator1 = Validator::make($request->all(), [
            
                    'title_1'=>'required',
                    'icon_1'=>'required',
                    'des_1'=>'required',
                    ]);
                    if ($validator1->fails()) {
                        $errors = $validator1->errors();
                        return redirect()->back()->withInput()->with('errors',$errors);
                    }
            }
            if($request->title_2 !=null || $request->icon_2 !=null || $request->des_2 !=null){
                $validator2 = Validator::make($request->all(), [
            
                    'title_2'=>'required',
                    'icon_2'=>'required',
                    'des_2'=>'required',
                    ]);
                    if ($validator2->fails()) {
                        $errors = $validator2->errors();
                        return redirect()->back()->withInput()->with('errors',$errors);
                    }
            }
            if($request->title_3 !=null || $request->icon_3 !=null || $request->des_3 !=null){
                $validator3 = Validator::make($request->all(), [
            
                    'title_3'=>'required',
                    'icon_3'=>'required',
                    'des_3'=>'required',
                    ]);
                    if ($validator3->fails()) {
                        $errors = $validator3->errors();
                        return redirect()->back()->withInput()->with('errors',$errors);
                    }
            }
            if($request->title_4 !=null || $request->icon_4 !=null || $request->des_4 !=null){
                $validator4 = Validator::make($request->all(), [
            
                    'title_4'=>'required',
                    'icon_4'=>'required',
                    'des_4'=>'required',
                    ]);
                    if ($validator4->fails()) {
                        $errors = $validator4->errors();
                        return redirect()->back()->withInput()->with('errors',$errors);
                    }
            }
            $about->update($request_all);
            return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
}
