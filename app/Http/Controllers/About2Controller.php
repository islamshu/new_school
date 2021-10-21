<?php

namespace App\Http\Controllers;

use App\About_2;
use Illuminate\Http\Request;
use Validator;
class About2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.about2.index')->with('about',About_2::first());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $about= About_2::first();
        $request_all = $request->except(['image']);
        
        if($request->image != null){
            $path = $request->image->store('about_image');
            $request_all['image']= $path;
        }
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            'list1'=>'required',
            'list2'=>'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $list1 = $request->list1;
           $dd=  str_replace('<ul>', '', $list1);
           $dd2=  str_replace('</ul>', '', $dd);
          $request_all['list1'] = $dd2;
          $list2 = $request->list2;
          $dd11=  str_replace('<ul>', '', $list2);
          $dd22=  str_replace('</ul>', '', $dd11);
         $request_all['list2'] = $dd22;
            
            $about->update($request_all);
            return redirect()->back()->with(['success'=>'تم التعديل بنجاح']);

    }

  
   
}
