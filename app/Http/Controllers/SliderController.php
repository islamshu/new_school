<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Validator;
class SliderController extends Controller
{
    public function index(){
        return view('dashboard.slider.index')->with('sliders',Slider::paginate(15));
    }
    public function updateStatus(Request $request)
{
    $slider = Slider::findOrFail($request->slider_id);
    $slider->status = $request->status;
    $slider->save();
    return response()->json(['message' => 'slider status updated successfully.']);
}
    public function create(){
        return view('dashboard.slider.create');
    }
    public function store(Request $request){
       
            $request_all = $request->except(['image']);
            if($request->image != null){
                $path_slider = $request->image->store('slider_image') ;
                $request_all['image']= $path_slider;
            }
            Slider::create($request_all);
            return redirect()->route('slider.index')->with(['success'=>'تم الاضافة بنجاح']);
           

          
    }
    public function edit($id){
        return view('dashboard.slider.edit')->with('slider',Slider::find($id));
    }
    public function update(Request $request,$id){
        $slider = Slider::find($id);
     
        
            $request_all = $request->except(['image']);
            if($request->image != null){
                $path_slider = $request->image->store('slider_image') ;
                $request_all['image']= $path_slider;
            }
           $slider->update($request_all);
            return redirect()->route('slider.index')->with(['success'=>'تم التعديل بنجاح']);
           
    }
    public function destroy($id){
        $slider = Slider::find($id);
        $slider->delete($id);
        return redirect()->route('slider.index')->with(['success'=>'تم الحذف بنجاح']);

    }
    
}
