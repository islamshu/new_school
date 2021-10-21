<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('dashboard.gallery.index')->with('galles',Gallery::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.gallery.index')->with('galles',Gallery::get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path= $request->image->store('gallery_imdage');
        $ga = new Gallery();
        $ga->caption =$request->caption;
        $ga->image = $path;
        $ga->save();
        return redirect()->route('gallery.index')->with('success','تمت الإضافة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('dashboard.gallery.edit')->with('galles',$gallery );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ga = Gallery::find($id);
        $ga->caption =$request->caption;
        if($request->image != null){
        $path= $request->image->store('gallery_imdage');
        $ga->image = $path;
        }
        $ga->save();
        return redirect()->route('gallery.index')->with('success','تمت التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ga = Gallery::find($id);
        $ga->delete();
        return redirect()->route('gallery.index')->with('success','تم الحذف بنجاح');


    }
}
