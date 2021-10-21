<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Config;
use Validator;
class ConfigController extends Controller
{
    public function edit(){
        $config = Config::first();
        return view ('dashboard.configs.edit')->with('config',$config);
    }
    public function update(Request $request){
        $config = Config::first();
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',   
            'description'=>'required'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);

                //return redirect()->back()->with(Input::all());
            }
            $request_all = $request->except(['logo','icon']);
            if($request->logo != null){
                $path_logo = $request->logo->store('site_logo') ;
                $request_all['logo']= $path_logo;
            }
            if($request->icon != null){
                $path_icon = $request->icon->store('site_icon') ;
                $request_all['icon']= $path_icon;
            }

          
           
          $config->update($request_all);
           if($config){
               return redirect()->back()->with(['success'=>'تم الاضافة بنجاح']);
           }else{
            return redirect()->back()->withInput()->with(['error'=>'خطأ في ادخال البيانات']);
           }
         
       
    }
}
