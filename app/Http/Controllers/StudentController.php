<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Student;
use PDF;

use App\Config;
use App\Branch;
use App\Father;
use App\General;
use App\Price;
use App\Studentpain;
use Carbon\Carbon;
use Exception;
use Session;
use App\ClassStudent;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'طلبات التسجيل المدفوعة';
        if (auth()->user()->HasRole('اداري')) {
            $stu =  Student::where('paid', 1)->where('withdrawn', 0)->orderBy('id', 'DESC')->get();
        } else {
            $branch = auth()->user()->branch;
            $stu = Student::where('paid', 1)->where('withdrawn', 0)->whereIn('branch', $branch)->orderBy('id', 'DESC')->get();
        }
        return view('dashboard.student.index2')->with('title', $title)->with('students', $stu);
    }
    public function unpid()
    {
        $title = 'طلبات التسجيل المدفوعة';
        if (auth()->user()->HasRole('اداري')) {
            $stu =  Student::where('paid', 0)->orderBy('id', 'DESC')->get();
        } else {
            $branch = auth()->user()->branch;
            $stu = Student::where('paid', 0)->whereIn('branch', $branch)->orderBy('id', 'DESC')->get();
        };
        return view('dashboard.student.index2')->with('title', $title)->with('students', $stu);
    }
    public function show($id)
    {
        // dd($id);
        return view('dashboard.student.show')->with('student', Student::find($id))->with('branches', Branch::get());
    }
    public function destroy($id)
    {
        $st = Student::find($id);
        $st->delete();

        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
    public function change_stage(Request $request){
       
        $price = Price::where('branch_id',$request->branch)->where('stage_id',$request->stage)->first();
        // dd($request);
        $student = Student::find($request->student_id);
        $student->branch = $request->branch;
        $student->stage = $request->stage;
        $student->total = $price->total;
        $student->fist_q = $price->fist_q;
        $student->month_p = $price->month_p;
        
        $student->save();
        $student->total_remain = $student->total - $student->total_paid;
        $student->save();
        $date = '2021-09-28';

        if($student->paid != 1){
         $data = [
            ['student_id'=>$student->id, 'status'=> 1 , 'amount'=>$student->fist_q,'payment_date'=>$student->created_at,'session_id'=>$student->session_id],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date ),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(1),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(2),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(3),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(4),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(5),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(6),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(7),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(8),'session_id'=>0],
        ];

        Studentpain::insert($data); 
       
        }else{
            $paid = $student->total_paid;
            $total_st = Studentpain::where('student_id',$request->student_id)->delete();
            $total_ream = $student->total_remain;
            $part =  $total_ream / 9;       
            $data = [
                ['student_id'=>$student->id, 'status'=> 1 , 'amount'=>$paid,'payment_date'=>$student->created_at,'session_id'=>$student->session_id],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date ),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(1),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(2),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(3),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(4),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(5),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(6),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(7),'session_id'=>0],
                ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(8),'session_id'=>0],
            ];
    
            Studentpain::insert($data); 
            
        }
        session()->put('success','تم تعديل بيانات الطالب بنجاح');

        return true;
    }
    public function get_stage_admin(Request $request)
    {
        $branch = $request->branch;
        if ($branch == 6 || $branch == 7 ||  $branch == 9 || $branch == 11) {
            $form = '

                          
            

            <option value="روضة"  >روضة</option>
          <option value="تمهيدي"  >تمهيدي</option>
            <option value="تجهيزي"  >تجهيزي</option>
          
           ';
        } else {
            $form = '
                                                
         
      
              <option value="صف أول"  >صف أول</option>
            <option value="صف ثاني"  >صف ثاني</option>
              <option value="صف ثالث"  >صف ثالث</option>
              <option value="صف رابع"  >صف رابع</option>
       
              ';
        }
        return $form;
    }
    // public function student_paids($session_id){

    //             $pay_key = ['5rfXU0xBMo0dz0dFujbuTJaNxeAnkf','P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL','sHckBzBpdRwKyAiv8fl9uqDqIBPZMN','YVjZX6LrwXMuRT6MNVpO2yFHJetSlE'];
    //             foreach($pay_key as $key=> $val){

    //               $headers = [
    //             'Authorization' => 'Bearer token',
    //             'thawani-api-key'=>$val,
    //         ];
    //       $client=   new \GuzzleHttp\Client([
    //             'headers' => $headers
    //         ]);
    //      try{
    //         $r = $client->request('get', 'https://checkout.thawani.om/api/v1/checkout/session/'.$session_id);
    //     $response = $r->getBody()->getContents();
    //     $array = json_decode($response, true);


    // //   $status = $array['data']['total_amount'];
    //      }catch (Exception $e) {

    //         continue;

    // }

    // $student_paids = Studentpain::where('session_id',$session_id)->get();
    // // dd($student_paids);
    // if($array['data']['payment_status'] == 'paid'){

    // $total =0;
    // $month = array();

    // $status = $array['data']['payment_status']; 
    //     foreach($student_paids as $pr ){
    //               $tot = $pr->amount;
    //                 $pr->status = 1;
    //                 $pr->save();
    //                 $total += $tot;
    //                 array_push($month,$pr->payment_date);
    //     }
    //       $student = Student::find($student_paids->first()->student_id);  
    //         $order = new Order();
    //         $order->student_id  = $student->id;
    //         $order->amount =  $total;
    //         $order->father_id = $student->father_id;
    //         $order->total_remain= $student->total_remain -$total;
    //         $order->total_paid =$student->total_paid + $total ;
    //         $order->code = date('Ymd-His').rand(1,6);
    //         $order->session_id  =$session_id; 
    //         $order->months = json_encode($month);
    //         $order->save();
    //         return redirect()->back()->with(['success'=>'تم التأكد من حالة الدفع']);

    // }elseif($array['data']['payment_status'] == 'unpaid'){
    //     foreach($student_paids as $pr ){
    //                 $pr->session_id = '0'.$session_id;
    //                 $pr->save();
    // }
    //               return redirect()->back()->with(['success'=>'تم التحقق ولم يتم الدفع']);

    // }else{
    //               return redirect()->back()->with(['error'=>'لقد حدث خطأ ما  ']);

    // }







    // }

    // }
    public function student_paids($session_id)
    {

        $pay_key = ['5rfXU0xBMo0dz0dFujbuTJaNxeAnkf', 'P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL', 'sHckBzBpdRwKyAiv8fl9uqDqIBPZMN', 'YVjZX6LrwXMuRT6MNVpO2yFHJetSlE'];
        foreach ($pay_key as $key => $val) {

            $headers = [
                'Authorization' => 'Bearer token',
                'thawani-api-key' => $val,
            ];
            $client =   new \GuzzleHttp\Client([
                'headers' => $headers
            ]);
            try {

                $r = $client->request('get', 'https://checkout.thawani.om/api/v1/checkout/session/' . $session_id);
                $response = $r->getBody()->getContents();

                $array = json_decode($response, true);



                $student_paids = Studentpain::where('session_id', $session_id)->get();

                if ($array['data']['payment_status'] == 'paid') {

                    $total = 0;
                    $month = array();

                    $status = $array['data']['payment_status'];
                    foreach ($student_paids as $pr) {
                        $tot = $pr->amount;
                        $pr->status = 1;
                        $pr->save();
                        $total += $tot;
                        array_push($month, $pr->payment_date);
                    }
                    $student = Student::find($student_paids->first()->student_id);
                    $order = new Order();

                    $order->student_id  = $student->id;
                    $order->amount =  $total;
                    $order->father_id = $student->father_id;
                    $order->total_remain = $student->total_remain - $total;
                    $order->total_paid = $student->total_paid + $total;
                    $order->code = date('Ymd-His') . rand(1, 6);
                    $order->session_id  = $session_id;
                    $order->months = $student->created_at;
                    $order->save();
                    foreach ($student_paids as $pr) {
                        $pr->session_id = '0' . $session_id;
                        $pr->save();
                    }

                    return redirect()->back()->with(['success' => 'تم التأكد من حالة الدفع']);
                } else {
                    foreach ($student_paids as $pr) {
                        $pr->session_id = '0' . $session_id;
                        $pr->save();
                    }

                    return redirect()->back()->with(['success' => 'تم التحقق ولم يتم الدفع']);
                }
            } catch (Exception $e) {
                continue;
            }
            return redirect()->back()->with(['success' => 'حدث خطأ']);
        }
    }
    public function check_paid($id)
    {
        $keys = ['P3LBgoCAKwOqAa34gc3AZ8lrd9NjTL', '5rfXU0xBMo0dz0dFujbuTJaNxeAnkf', 'sHckBzBpdRwKyAiv8fl9uqDqIBPZMN', 'YVjZX6LrwXMuRT6MNVpO2yFHJetSlE'];
        $student = Student::find($id);
        if ($student->payment_method == "نقدي") {
            return redirect()->back()->with(['errorr' => 'لقد تم الدفع نقدا']);
        }
        $session_id = $student->session_id;
        $keys = session::put('keys', $keys);
        $length =  strlen($session_id);
        if ($length > 3) {
            if ($session_id[0] != 0) {
                $session_id = $student->session_id;
            } else {
                $string = $session_id;
                $pattern = '/^0/';
                $replacement = '';
                $session_id = preg_replace($pattern, $replacement, $string);
                $session_id = ltrim($session_id, '0');
            }
        } else {
            return redirect()->back()->with(['errorr' => 'لا يمكن التحقق من حالة الدفع']);
        }

        $array = $this->check_status($session_id);
        //   dd($array);

        if ($array['data']['payment_status'] == 'paid') {

            if ($student->paid != 1) {
                if ($student->session_id[0] != 0) {
                    $student->session_id = '0' . $student->session_id;
                }
                $student->paid = 1;
                $student->total_paid = $array['data']['total_amount'] / 1000;
                $student->total_remain = $student->total - $student->total_paid;
                $fath = Father::where('father_id', $student->father_id)->first();
                if (!$fath) {
                    $father = new Father();
                    $father->name = $student->father_name;
                    $father->father_id = $student->father_id;
                    $father->email = $student->father_email;
                    $father->phone = $student->father_phone;
                    $father->password = bcrypt($father->father_id);
                    $father->save();
                }
                $student->save();
                $date = '2021-09-28';

                $studentpain = Studentpain::where('student_id', $student->id)->count();
                $total_ream = $student->total_remain;
                $part =  $total_ream / 9;
                //   dd($studentpain);
                if ($studentpain == 0) {

                    $data = [
                        ['student_id'=>$student->id, 'status'=> 1 , 'amount'=>$student->fist_q,'payment_date'=>$student->created_at,'session_id'=>$student->session_id],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date ),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(1),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(2),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(3),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(4),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(5),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(6),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(7),'session_id'=>0],
                        ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$part,'payment_date'=>Carbon::parse( $date )->addMonths(8),'session_id'=>0],
                    ];
                    Studentpain::insert($data); 
                 
                }
                $order = new Order();
                $order->student_id  = $student->id;
                $order->amount =  $student->fist_q;
                $order->father_id = $student->father_id;
                $order->code = date('Ymd-His') . rand(1, 6);
                $order->months = $student->created_at;
                $order->total_paid =  $order->amount;
                $order->total_remain = $student->total - $student->fist_q;
                $order->session_id  = $student->session_id;

                $order->save();
                //  $student->total_paid += $total;
                // $student->total_remain -= $total;
                // $student->save();

            }
            return redirect()->back()->with(['success' => 'تم التحقق من عملية الدفع (مدفوع)']);
        }

        return redirect()->back()->with(['errorr' => 'لم يتم الدفع بعد']);
    }
    public function show_pains($id)
    {
        return view('dashboard.student.pains')->with('studentpains', Studentpain::where('student_id', $id)->get());
    }
    public function check_status($session)
    {
        if ($session[0] != 0) {
            $session = $student->$session;
        } else {
            $string = $session;
            $pattern = '/^0/';
            $replacement = '';
            $session = preg_replace($pattern, $replacement, $string);
            $session = ltrim($session, '0');
        }
        //   dd($session);
        $keys = Session::get('keys');
        foreach ($keys as $key) {


            $headers = [
                'Authorization' => 'Bearer token',
                'thawani-api-key' => $key,
            ];
            $client =   new \GuzzleHttp\Client([
                'headers' => $headers
            ]);
            //   dd($session);
            try {
                $r = $client->request('get', 'https://checkout.thawani.om/api/v1/checkout/session/' . $session);
                $response = $r->getBody()->getContents();
                $array = json_decode($response, true);
                //   $status = $array['data']['total_amount'];
                //   dd($status/1000);

                return $array;
            } catch (Exception $e) {

                continue;
            }
        }
        return 'unpiad';
    }
    public function refresh(Request $request)
    {
        $student = Student::find($request->student_id);
        $student->payment_method = "نقدي";
        $student->paid = 1;
        $student->total_paid = $student->fist_q;
        $student->total_remain  = $student->total - $student->total_paid;
        $student->save();
        $fath = Father::where('father_id', $student->father_id)->first();
        if (!$fath) {
            $father = new Father();
            $father->name = $student->father_name;
            $father->father_id = $student->father_id;
            $father->email = $student->father_email;
            $father->phone = $student->father_phone;
            $father->password = bcrypt($father->father_id);
            $father->save();
        }
        $student->save();
        $date = '2021-09-28';
        $data = [
            ['student_id'=>$student->id, 'status'=> 1 , 'amount'=>$student->fist_q,'payment_date'=>$student->created_at,'session_id'=>$student->session_id],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date ),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(1),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(2),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(3),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(4),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(5),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(6),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(7),'session_id'=>0],
            ['student_id'=>$student->id, 'status'=> 0 , 'amount'=>$student->month_p,'payment_date'=>Carbon::parse( $date )->addMonths(8),'session_id'=>0],
        ];
        Studentpain::insert($data); 
        $order = new Order();
        $order->student_id  = $student->id;
        $order->amount =  $student->fist_q;
        $order->father_id = $student->father_id;
        $order->code = date('Ymd-His') . rand(1, 6);
        $order->months = $student->created_at;
        $order->total_paid =  $order->amount;
        $order->total_remain = $student->total - $student->fist_q;
        // $order->session_id  =$student->session_id;

        $order->save();
        return true;
    }
    public function withdrawn(Request $request)
    {

        $st = Student::find($request->student);
        $st->withdrawn = $request->status;
        $st->save();



        $title = 'طلبات التسجيل المدفوعة';
        if (auth()->user()->HasRole('اداري')) {
            $stu =  Student::where('paid', 1)->where('withdrawn', 0)->orderBy('id', 'DESC')->get();
        } else {
            $branch = auth()->user()->branch;
            $stu = Student::where('paid', 1)->where('withdrawn', 0)->whereIn('branch', $branch)->orderBy('id', 'DESC')->get();
        }
        return view('dashboard.student._student')->with('title', $title)->with('students', $stu);
    }
    public function withdrawnStudent()
    {
        $title = 'الطلاب المنسحبين';
        if (auth()->user()->HasRole('اداري')) {
            $stu =  Student::where('withdrawn', 1)->orderBy('id', 'DESC')->get();
        } else {
            $branch = auth()->user()->branch;
            $stu = Student::where('withdrawn', 1)->whereIn('branch', $branch)->orderBy('id', 'DESC')->get();
        }
        return view('dashboard.student.index2')->with('title', $title)->with('students', $stu);
    }
    public function report(Request $request)
    {
        return view('dashboard.student.report')->with('students', Student::get());
    }
    public function search(Request $request)
    {

        if (auth()->user()->HasRole('اداري')) {
            $st = Student::query();
        } else {
            $branch = auth()->user()->branch;

            $st = Student::whereIn('branch', $branch);
        }

        $st->when($request->branch_id, function ($q) use ($request) {
            return $q->where('branch', 'like', '%' . $request->branch_id . '%');
        });
        $st->when($request->stage_id, function ($q) use ($request) {
            return $q->where('stage', 'like', '%' . $request->stage_id . '%');
        });

        if ($request->from != null && $request->to == null) {
            $st->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', $request->to);
            });
        } elseif ($request->from != null && $request->to != null) {
            $st->when($request->to, function ($q) use ($request) {
                return $q->whereBetween('created_at', array($request->from, $request->to));
            });
        }
        $students =   $st->get();
        return view('dashboard.student.report', compact('students', 'request'));
        //   return view('dashboard.reports.search', compact('tics', 'request','people','users','cats'));
    }
    public function print($id)
    {
        $student =    Student::find($id);
        // $data['student_name']=  $student->student_name;
        if ($student->gender == 'Male') {
            $gender = 'ذكر';
        } else {
            $gender = 'انثى';
        }
        if ($student->normal == 1) {
            $normal = 'طبيعي';
        } elseif ($student->normal == 2) {
            $normal = 'يعاني من أمراض';
        } else {
            $normal = 'يعاني من حساسية';
        }
        if ($student->paid == 1) {
            $paid = 'مدفوع';
            if ($student->class != 0) {
                $class = ClassStudent::find($student->class)->name;
            } else {
                $class = 'غير مدرج';
            }
        } else {
            $paid = 'غير مدفوع';
            $class = '_';
        }
        $data = [
            'logo' => Config::first()->logo,
            'id' => $student->id,
            'student_name' => $student->student_name,
            'created_at' => $student->created_at,
            'student_tribe' => $student->student_tribe,
            'student_date' => $student->student_date,
            'age_start' => $student->age_start,
            'gender' => $gender,
            'speking' => $student->speking,
            'nationality' => $student->nationality,
            'place_now' => $student->place_now,
            'governorate' => $student->governorate,
            'state' => $student->state,
            'village' => $student->vallage,
            'normal' => $normal,
            'student_life' => $student->student_life,
            'near_place' => $student->near_place,
            'description_place' => $student->description_place,
            'take_at' => $student->take_at,
            'return_at' => $student->return_at,
            'father_name' => $student->father_name,
            'link_student' => $student->link_student,
            'father_id' => $student->father_id,
            'father_phone' => $student->father_phone,
            'father_email' => $student->father_email,
            'father_student' => $student->father_student,
            'father_job' => $student->father_job,
            'father_palce_job' => $student->father_palce_job,
            'mother_name' => $student->mother_name,
            'mother_id' => $student->mother_id,
            'mother_phone' => $student->mother_phone,
            'mother_student' => $student->mother_student,
            'mother_job' => $student->mother_job,
            'mother_palce_job' => $student->mother_palce_job,
            'branch' => Branch::find($student->branch)->title,
            'stage' => $student->stage,
            'total' => $student->total,
            'fist_q' => $student->fist_q,
            'paid' => $paid,
            'total_paid' => $student->total_paid,
            'total_remain' => $student->total_remain,
            'class' => $class
        ];

        $pdf = PDF::loadView('dashboard.student.pdf', $data);
        return $pdf->stream('document.pdf');
    }
}
