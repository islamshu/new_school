<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Price;
use App\Stage;
use Illuminate\Http\Request;
use Validator;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.price.index')->with('prices',Price::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.price.create')->with('branches',Branch::get())->with('stages',Stage::get());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $val = Price::where('stage_id',$request->stage_id)->where('branch_id',$request->branch_id)->first();
       if(!$val){
        $validator = Validator::make($request->all(), [
            'branch_id'=>'required',
            'stage_id'=>'required',
            'total'=>'required',
            'fist_q'=>'required',
            'month_p'=>'required'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors();
                
                return redirect()->back()->withInput()->with('errors',$errors);
            }
            $request_all = $request->except(['pivot']);
            if($request->pivot != null){
               $data = [];
                foreach ($request->pivot as $key => $value) {
                  $data[$key] = $request->pivot[$key];
                    // $data[$key] = $value['color']  $value['value']
                }
            
                $request_all['value'] = (json_encode($data));
                // dd($request_all);
            }
            Price::create($request_all);
            return redirect()->back()->with('success','تمت الإضافة بنجاح');
       }else{
        //    $errors=['موجود مسبقا'];
    
        return redirect()->back()->withInput()->with('errorr','موجود مسبقا');
    }
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        return view('dashboard.price.edit')->with('price',Price::find($id))->with('branches',Branch::get())->with('stages',Stage::get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $price = Price::find($id);
        $price->update($request->all());
        return redirect()->back()->with('success','تم التعديل بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pri = Price::find($id);
        $pri->delete();
        return redirect()->back()->with('success','تم الحذف بنجاح');


    }
}
