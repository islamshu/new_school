<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Branch;
use Illuminate\Http\Request;
use PDF;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.employee.index')->with('employees',Employee::where('is_finish',0)->get());
    }
    public function index2(){
                return view('dashboard.employee.index')->with('employees',Employee::where('is_finish',1)->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.employee.create')->with('branches',Branch::get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
   $rules = [
            'name'=>'required',
            'nationality'=>'required',
            'social_status'=>'required',
            'address'=>'required',
            'dob'=>'required',
            'start_job'=>'required',
            'id_number'=>'required',
            'job'=>'required',
            'branch_id'=>'required',
            'helth_status'=>'required',
            'qualification'=>'required',
            'experience'=>'required',
            'courses'=>'required',
            'salary'=>'required',

    ];

    $customMessages = [
         'name.required' => 'الاسم مطلوب',
         'nationality.required' => 'الجنسية مطلوب',
         'social_status.required' => 'الحالة الاجتماعية مطلوب',
         'address.required' => 'مكان السكن مطلوب',
         'dob.required' => 'تاريخ الميلاد مطلوب',
         'start_job.required' => 'تاريخ بدء العمل مطلوب',
         'id_number.required' => 'الرقم المدني مطلوب',
         'job.required' => 'الوظيفة مطلوب',
         'branch_id.required' => 'الفرع مطلوب',
         'helth_status.required' => 'الحالة الصحية مطلوب',
         'qualification.required' => ' المؤهل الدراسي مطلوب',
         'experience.required' => 'الخبرات مطلوب',
         'courses.required' => 'الدورات مطلوب',
         'salary.required' => 'الراتب مطلوب',

         
    ];
    $this->validate($request, $rules, $customMessages);
    Employee::create($request->all());
    return redirect()->route('employes.index')->with(['success'=>'تمت الاضافة بنجاح']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('dashboard.employee.show')->with('employee',Employee::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                return view('dashboard.employee.edit')->with('employee',Employee::find($id))->with('branches',Branch::get());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,$id)
    {
            $emoployee = Employee::find($id);
   $rules = [
            'name'=>'required',
            'nationality'=>'required',
            'social_status'=>'required',
            'address'=>'required',
            'dob'=>'required',
            'start_job'=>'required',
            'id_number'=>'required',
            'job'=>'required',
            'branch_id'=>'required',
            'helth_status'=>'required',
            'qualification'=>'required',
            'experience'=>'required',
            'courses'=>'required',
            'salary'=>'required',
    ];

    $customMessages = [
         'name.required' => 'الاسم مطلوب',
         'nationality.required' => 'الجنسية مطلوب',
         'social_status.required' => 'الحالة الاجتماعية مطلوب',
         'address.required' => 'مكان السكن مطلوب',
         'dob.required' => 'تاريخ الميلاد مطلوب',
         'start_job.required' => 'تاريخ بدء العمل مطلوب',
         'id_number.required' => 'الرقم المدني مطلوب',
         'job.required' => 'الوظيفة مطلوب',
         'branch_id.required' => 'الفرع مطلوب',
         'helth_status.required' => 'الحالة الصحية مطلوب',
         'qualification.required' => ' المؤهل الدراسي مطلوب',
         'experience.required' => 'الخبرات مطلوب',
         'courses.required' => 'الدورات مطلوب',
         'salary.required' => 'الراتب مطلوب',

    ];
    $this->validate($request, $rules, $customMessages);
    $emoployee->update($request->all());
    return redirect()->back()->with(['success'=>'تمت التعديل بنجاح']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $em=Employee::find($id);
        $em->is_finish = 1;
        $em->save();
            return redirect()->back()->with(['success'=>'تمت الحذف بنجاح']);
    }
      public function redestroy($id)
    {
        $em=Employee::find($id);
        $em->is_finish = 0;
        $em->save();
            return redirect()->back()->with(['success'=>'تمت إعادة الموظف بنجاح']);
    }
    
     public function print($id){
    $emoployee=    Employee::find($id);

if($emoployee->social_status == 1){
    $status = 'عزباء' ;
}elseif($emoployee->social_status == 2){
    $status = 'متزوجة' ;

}elseif($emoployee->social_status == 2){
    $status = 'مطلقة' ;
}else{
    $status = 'أرملة' ;
}


 
        $data = [
    'id'=> $emoployee->id,
    'status'=>$status,
];
    $pdf = PDF::loadView('dashboard.employee.pdf', $data);
    return $pdf->stream('document.pdf');
    }
}
