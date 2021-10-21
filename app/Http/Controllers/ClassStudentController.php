<?php

namespace App\Http\Controllers;

use App\ClassStudent;
use Illuminate\Http\Request;
use App\Stage;
use App\Branch;
use App\Student;
class ClassStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = auth()->user()->branch;
        // dd($branch);
        $clasess = ClassStudent::select(['stage_id','branch_id'])->whereIn('branch_id',$branch)->distinct()->get();
// dd($clasess);
        return view('dashboard.classes.index')->with('clasess',$clasess);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stages =Stage::get();
        $branches = Branch::get();

                return view('dashboard.classes.create')->with('stages',$stages)->with('branches',$branches);

    }
        public function create_class($id)
    {
        
        $class = ClassStudent::find($id);
     $branch = Branch::find($class->branch_id);
    $stage = Stage::find( $class->stage_id);
   

                return view('dashboard.classes.create')->with('stage',$stage)->with('branch',$branch);

    }
     public function get_classes($branch,$stage)
    {
        $classes = ClassStudent::where('branch_id',$branch)->where('stage_id',$stage)->get();
        
        
                return view('dashboard.classes.index_classes')->with('classes',$classes);

    }
    public function get_student_show_class($id){
        $class = ClassStudent::find($id);
        $branch = $class->branch_id;
        $stage = Stage::find($class->stage_id)->title;
        $students = Student::where('branch',$branch)->where('stage',$stage)->where('class',$class->id)->where('paid',1)->get();
             $title = 'جميع الطلبة المدرجين في صف '.' '. $class->name.' '.Branch::find($class->branch_id)->title. ' '. 'مرحلة' . ' ' . Stage::find($class->stage_id)->title ;
        $classes=$class->id;
                return view('dashboard.classes.students')->with('students',$students)->with('title',$title)->with('classes',$classes);
    }
    public function get_studnet($id){
        $class = ClassStudent::find($id);
        $branch = $class->branch_id;
        $stage = Stage::find($class->stage_id)->title;
        $students = Student::where('branch',$branch)->where('stage',$stage)->where('class',0)->where('paid',1)->get();
        $title = 'الطلبة الغير مدرجين تحت أي صف';
        $classes=$class->id;
                return view('dashboard.classes.students')->with('students',$students)->with('title',$title)->with('classes',$classes);
        
    }
    public function add_student(Request $request ){
        $request->validate([
            ]);
            $rules = [
                 'studnets'=>'required|min:1'

    ];
             $customMessages = [
        'studnets.required' => 'يجب اضافة على الاقل طالب واحد',
        'studnets.min' => 'يجب اضافة على الاقل :min طالب   '

    ];
        $this->validate($request, $rules, $customMessages);

    foreach($request->studnets as $st){
        $st = Student::find($st);
        $st->class = $request->class;
        $st->save();
    }
    
    return redirect()->back()->with(['success'=>'تم اضافة الطلاب الى الصف بنجاح']);
    }
    
    public function remove_student(Request $request){
    $request->validate([
            ]);
            $rules = [
                 'studnets'=>'required|min:1'

    ];
             $customMessages = [
        'studnets.required' => 'يجب اخراج على الاقل طالب واحد',
        'studnets.min' => 'يجب اضافة على الاقل :min طالب   '

    ];
        $this->validate($request, $rules, $customMessages);

    foreach($request->studnets as $st){
        $st = Student::find($st);
        $st->class =0;
        $st->save();
    }
    
    return redirect()->back()->with(['success'=>'تم  اخراج الطلاب من الصف بنجاح']);
    }
    
    
    
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'capacity'=>'required|numeric'
            ]);
        if(ClassStudent::where('branch_id',$request ->branch_id)->where('stage_id',$request ->stage_id)->where('name',$request->name)->first()){
                return redirect()->back()->with(['errorr'=>'قيمة الاسم مُستخدمة من قبل']);
            }
        $student = new ClassStudent();
        $student->branch_id = $request ->branch_id;
         $student->stage_id = $request ->stage_id;
        $student->name = $request ->name;
        $student->capacity = $request ->capacity;
        $student->save();
        return $this->get_classes($student->branch_id,$student->stage_id)->with(['success'=>'تم اضافة الصف بنجاح   ']);




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function show(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassStudent $classStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassStudent $classStudent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassStudent  $classStudent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassStudent $classStudent)
    {
        //
    }
}
