<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Validator;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.course.index')->with('courses',Course::get());
    }
    public function updateStatus(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        $course->status = $request->status;
        $course->save();
        return response()->json(['message' => 'servise status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.course.create');
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
            'program'=>'required',
            'price'=>'required',
            'address'=>'required',
            'from'=>'required',
            'to'=>'required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            Course::create($request->all());
            return redirect()->route('course.index')->withInput()->with('success','تمت الإضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd(Course::find($id));
        return view('dashboard.course.edit')->with('course',Course::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $course = Course::find($id);
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'program'=>'required',
            'price'=>'required',
            'address'=>'required',
            'from'=>'required',
            'to'=>'required',

            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $course->update($request->all());
            return redirect()->route('course.index')->withInput()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect()->route('course.index')->with('success','تم الحذف بنجاح');

    }
   
 
}
