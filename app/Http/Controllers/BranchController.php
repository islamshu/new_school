<?php

namespace App\Http\Controllers;

use App\Branch;
use Illuminate\Http\Request;
use Validator;
class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.branches.index')->with('branches',Branch::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.branches.index')->with('branches',Branch::get());

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
            'title'=>'unique:branches,title|required',
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            Branch::create($request->all());
            return redirect()->back()->withInput()->with('success','تمت الإضافة بنجاح');
    }
    public function update_status(Request $request){
       $bra = Branch::find($request->branchid);
       $bra->status = $request->status;
       $bra->save();
       return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('dashboard.branches.edit')->with('branche',Branch::find($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bra = Branch::find($id);
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:branches,title,'.$bra->id,
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $bra->update($request->all());
            return redirect()->route('branches.index')->with('success','تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bra = Branch::find($id);
        $bra->delete();
        return redirect()->route('branches.index')->with('success','تم الحذف بنجاح');

    }
}
