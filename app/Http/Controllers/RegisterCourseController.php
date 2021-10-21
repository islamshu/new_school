<?php

namespace App\Http\Controllers;
use App\Course;
use App\CourseStudent;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use App\Notification;
use Auth;
use PDF;
use App\Notifications\CourseNot ;
use App\Http\Controllers\ThawaniController;

class RegisterCourseController extends Controller
{
    public function index()
        {
            return view('fronts.form2')->with('course', Course::where('status',1)->get());
        }

        public function course(Request $request){

           $cor = Course::find($request->co_id) ;
           $show = $cor->show;
           if($show == 1){
               $type = 'حضور مباشر';
           }
            if($show == 0){
               $type = 'عند بعد';
           }
            if($show == 2){
               $type = 'مدمج';
           }

         
      $form = '
            <div class="form-group">
            <label for="name">اسم البرنامج التدريبي   :</label>
            <input type="text" name="program" value="'.$cor->program .'" disabled id="name" required/>
        </div>
                <div class="form-row">

                <div class="form-group">
                <label for="name">تاريخ بدء البرنامج  :</label>
                <input type="date" name="from"  value='.$cor->from .' disabled id="name" required/>
            </div>
            <div class="form-group">
                <label for="father_name">الى :</label>
                <input type="date" name="to"  value='.$cor->to .' disabled id="name" required/>
            </div>
            
        </div>
           <div class="form-group">
    <label for="name"> رسوم الدورة    :</label>
    <input type="text" name="price"  value='.$cor->price .' disabled id="name" required/>
        </div>
    
    
    
               <div class="form-group">
    <label for="name"> مكان الدورة   :</label>
    <input type="text" name="from"  value='.$cor->address .' disabled id="name" required/>
            </div>
        </div>';
    
     
          
        
            return $form;
            

        }
        public function store(Request $request){
        $request_all = $request->except(['random_id']);
        $request_all['code'] = date('Ymd-His').rand(1,6);
          $co = CourseStudent::create($request_all);
          
          if($co){
                $user = Admin::first();
             $user ->notify(new CourseNot($co));
          }
            $mwalih = new ThawaniController;
        return $mwalih->register_coures($request,$co);


        }

        public function paid(){
            return view('dashboard.course.student')->with('students',CourseStudent::where('paid',1)->get());
        }
        public function unpaid(){
            return view('dashboard.course.student')->with('students',CourseStudent::where('paid',0)->get());
        }
        public function show($id){
        $co=    CourseStudent::find($id);
            
            return view('dashboard.course.show_student')->with('student',$co);
        }
        public function destroy($id){
       $dd=      CourseStudent::find($id);
            $dd->delete();
            return redirect()->route('course_student')->with('success','تم حذف الطلب بنجاح');
        }
         public function print($id){
                $course = CourseStudent::find($id);

        $data = [
  
    'id'=> $course->id,
   
];
    
    $pdf = PDF::loadView('dashboard.course.pdf', $data);
    return $pdf->stream('document.pdf');
    }



}
