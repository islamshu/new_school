<?php

namespace App\Http\Controllers;

use App\Stage;
use Illuminate\Http\Request;
use Validator;
class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.stages.index')->with('stages',Stage::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.stages.index')->with('stages',Stage::get());

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
            'title'=>'unique:stages,title|required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            Stage::create($request->all());
            return redirect()->back()->withInput()->with('success','تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stage  $branch
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stage  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.stages.edit')->with('stage',Stage::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stage  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stage = Stage::find($id);
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:stages,title,'.$stage->id,
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $stage->update($request->all());
            return redirect()->route('stages.index')->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stage  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stage = Stage::find($id);
        $stage->delete();
        return redirect()->route('stages.index')->with('success','تم الحذف بنجاح');

    }
}
