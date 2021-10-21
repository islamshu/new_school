<?php

namespace App\Http\Controllers;

use App\Study;
use Illuminate\Http\Request;
use Validator;
class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.study.index')->with('studs',Study::get());
    }
    public function updateStatus(Request $request)
    {
        $study = Study::findOrFail($request->study_id);
        $study->status = $request->status;
        $study->save();
        return response()->json(['message' => 'study status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.study.create');
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
            $path = $request->image->store('study_img');
            $request_all['image'] = $path;
            Study::create($request_all);
            return redirect()->route('study.index')->withInput()->with('success','تمت الإضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.study.edit')->with('study',Study::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $study = Study::find($id);
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
                $path = $request->image->store('study_img');
            $request_all['image'] = $path;
            }
            $study->update($request_all);
            return redirect()->route('study.index')->withInput()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study = Study::find($id);
        $study->delete();
        return redirect()->route('study.index')->with('success','تم الحذف بنجاح');

    }
}
