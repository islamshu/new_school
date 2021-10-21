<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Validator;
class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.review.index')->with('reviews',Review::get());
    }
    public function updateStatus(Request $request)
    {
        $review = Review::findOrFail($request->review_id);
        $review->status = $request->status;
        $review->save();
        return response()->json(['message' => 'review status updated successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.review.create');
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
            'image'=>'required',
            'description'=>'required',
            ]);
            $request_all = $request->except(['image']);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $path = $request->image->store('review_img');
            $request_all['image'] = $path;
            Review::create($request_all);
            return redirect()->route('review.index')->withInput()->with('success','تمت الإضافة بنجاح');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.review.edit')->with('review',Review::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $review = Review::find($id);
        $validator = Validator::make($request->all(), [
            'description'=>'required',
            ]);
            $request_all = $request->all();

            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            if($request->image != null){
                $path = $request->image->store('review_img');
            $request_all['image'] = $path;
            }
            $review->update($request_all);
            return redirect()->route('review.index')->withInput()->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = Review::find($id);
        $review->delete();
        return redirect()->route('review.index')->with('success','تم الحذف بنجاح');

    }
}
