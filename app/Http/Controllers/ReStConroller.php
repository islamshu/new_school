<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Price;
use App\Stage;
use App\Student;
use App\Admin;
use App\Notification;
use Auth;
use App\Notifications\StudentNo ;
use App\Http\Controllers\Mwallehthwani;
use App\Http\Controllers\EBRYcONTROLLER;
use App\Http\Controllers\ElHayalController;
use App\Http\Controllers\Mabela2;




class ReStConroller extends Controller
{
    public function store_form1(Request $request){
// dd($request);
    $request->validate([
        'student_name'=>'required',
        'student_tribe'=>'required',
        'student_date'=>'required',
        'student_date_place'=>'required',
        'nationality'=>'required',
        'place_now'=>'required',
        'governorate'=>'required',
        'state'=>'required',
        'village'=>'required',
        'branch'=>'required',
        'gender'=>'required',
        'speking'=>'required',
        'normal'=>'required',
        'id_student'=> 'required'

    ]);
    
    $price = Price::where('branch_id',$request->branch)->where('stage_id',$request->stage)->first();

    $request_all = $request->all();
   session()->put('stage',$request->stage);
   session()->put('branch',$request->branch);

   
    $request_all['stage']=  session()->get('stage');
    $request_all['age_start']= $request->session()->get('state_age');
    $request_all['total']=  $price->total;
    $request_all['fist_q']=$price->fist_q;
    $request_all['month_p']=$price->month_p;
    
   
    if(session()->get('student_id') == null){
        $student =   Student::create($request_all);

        // $student =   new Student();
        // $student->student_name=$request->student_name;
        // $student->student_tribe = $request->student_tribe;


        // $student->stage = session()->get('stage');
        // $student->branch = session()->get('branch');
        // $student->age_start = $request->session()->get('state_age');
        // $student->total = $price->total;
        // $student->fist_q=$price->fist_q;
        // $student->month_p=$price->month_p;
        // $student->student_date = $request->student_date;
        // $student->student_date_place = $request->student_date_place;
        // $student->nationality = $request->nationality;
        // $student->place_now= $request->place_now;

        // $student->governorate = $request->governorate;
        // $student->state = $request->state;
        // $student->village= $request->village;
        // $student->gender = $request->gender;
        // $student->speking = $request->speking;
        // $student->normal= $request->normal;

        // $student->des_name = $request->des_name;
        // $student->age_start = $request->age_start;
        // $student->normal= $request->normal;
    
         if($student){
         $user = Admin::first();
         $user ->notify(new StudentNo($student));
    }
        Session()->put('step1', $request_all);
        Session()->put('student_id', $student->id);
    }else{
        
        $st =   Student::find(session()->get('student_id')); 
        Session()->put('step1', $request_all);
        
        $st->update($request_all);
    }
    
    // dd(Session()->get('step1'));

     return redirect()-> route('form2_wizerd');
    }
    public function done(){
        dd(session()->all());
        session()->flush();
     session()->put('modalll', 'true');
      
         
          return redirect()->route('front')->with(['error_code', 5]);
        
    }
    public function store_form2(Request $request){
       
        $request->validate([
            'father_name'=>'required',
            'link_student'=>'required',
            'father_id'=>'required',
            'father_phone'=>'required',
            'father_email'=>'required',
            'father_student'=>'required',
            'father_job'=>'required',
            'father_palce_job'=>'required',
           
        ]);
        $student = Student::find(session()->get('student_id'));
        $student->update($request->all());
    Session()->put('step2', $request->all());
   

        return redirect()-> route('form3_wizerd');

    }
    public function store_form3(Request $request){
        $request->validate([
            'mother_name'=>'required',
            'mother_id'=>'required',
            'mother_phone'=>'required',
            'mother_student'=>'required',
            'mother_job'=>'required',
            'mother_palce_job'=>'required', 
        ]);
        Session()->put('step3', $request->all());

        $student = Student::find(session()->get('student_id'));
        $student->update($request->all());
   

        return redirect()-> route('form4_wizerd');
    }
    public function store_form4(Request $request){
        // dd($request);
        $request->validate([
            'student_life'=>'required',
            'near_place'=>'required',
            'description_place'=>'required',
            'take_at'=>'required',
            'return_at'=>'required',
        ]);
        Session()->put('step4', $request->all());
        $student = Student::find(session()->get('student_id'));
        $student->update($request->all());
          Session()->put('step4', $request->all());
          

        return redirect()-> route('form5_wizerd');
    }
    public function store_student(Request $request){
                $student = Student::find(session()->get('student_id'));
                
                Session()->put('have_verfy', 1);
  
                
if($student->branch == 9 ||  $student->branch == 11){
        $mwalih = new Mwallehthwani;
        return $mwalih->thawani($request);
    }elseif($student->branch == 6){
        $ebry = new EBRYcONTROLLER;
        return $ebry->thawani($request);
    }elseif($student->branch == 7){
       
        $ebry = new ElHayalController;
        return $ebry->thawani($request);
    }elseif($student->branch == 10){
        $ebry = new Mabela2;
        return $ebry->thawani($request);
    }
}
function check_id(Request $request){
    if( session()->get('student_id') != null){
        $student = Student::where('id_student',$request->id)->where('id','!=',session()->get('student_id'))->where('paid',1)->first();
    }else{
        $student = Student::where('id_student',$request->id)->where('paid',1)->first();
    }
   
    if($student){
        return false;
    }else{
        return true;
    }
}public function show_bill_studnet($id){
 

  if($id ==  1){
        $b = '2021-09-28';
    }elseif($id ==  2){
        $b = '2021-10-28';
    }
    elseif($id ==  3){
        $b = '2021-11-28';

    }
    elseif($id ==  4){
        $b = '2021-12-28';
    }elseif($id ==  5){
        $b = '2022-01-28';
    }elseif($id ==  6){
        $b = '2022-02-28';
    }elseif($id ==  7){
        $b = '2022-03-28';
    }elseif($id ==  8){
        $b = '2022-04-28';
    }elseif($id == 9){
        $b = '2022-05-28';
    }

    $students = Student::with('pils')->where('paid',1)
    ->whereHas('pils', function  ($query) use ($b)   {
    $query->where('payment_date', $b)->where('status',0);
    })
    ->get();

    return view('dashboard.student.show_bilss')->with('students',$students)->with('title',$id+1);

}
}
