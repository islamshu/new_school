<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Validator;
class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.service.index')->with('services',Service::get());
    }
    public function updateStatus(Request $request)
    {
        $service = Service::findOrFail($request->service_id);
        $service->status = $request->status;
        $service->save();
        return response()->json(['message' => 'servise status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'image'=>'required',
            'description'=>'required',
            ]);
                        $request_all = $request->except(['image']);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $path = $request->image->store('service_img');
            $request_all['image'] = $path;
            Service::create($request_all);
            return redirect()->route('service.index')->withInput()->with('success','تمت الإضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.service.edit')->with('service',Service::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $service = Service::find($id);
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'description'=>'required',
            ]);
                        $request_all = $request->all();

            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            
             if($request->image != null){
                $path = $request->image->store('service_img');
            $request_all['image'] = $path;
            }
            $service->update($request_all);
            return redirect()->route('service.index')->withInput()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->route('service.index')->with('success','تم الحذف بنجاح');

    }
}
