<?php

namespace App\Http\Controllers;

use App\Fathermessage;
use App\Messagereplay;
use App\Student;
use Illuminate\Http\Request;
use Auth;
use App\Father;
use App\Admin;
use App\Notifications\SendMessage;
use App\Notifications\ReplyMessage;
use App\Notifications\ReplyMessageFather;

use Carbon\Carbon;



class FathermessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_meesage(){
      if(auth()->user()->HasRole('اداري')){
      $stu =  Fathermessage::orderBy('id', 'DESC')->get();

  }else {
           $branch = auth()->user()->branch;
       $stu = Fathermessage::whereIn('branch',$branch)->orderBy('id', 'DESC')->get();
  }
        return view('dashboard.father_message.index')->with('messages',$stu);
    }
    public function index()
    {
        return view('father.message.index')->with('messages',Fathermessage::where('user_id',Auth::user()->father_id)->orderBy('id','desc')->get());
    }

    public function show_admin_message($id){
        $mes = Fathermessage::with('relpays')->with('user')->find($id);
        $mes->view = 1;
        $mes->save();
        return view('dashboard.father_message.show')->with('message',$mes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Student::where('father_id',Auth::User()->father_id)->get()->unique('branch');
        $array=[];
        foreach($branches as $bra){
            $br = $bra->branch;
            array_push($array,$br);
        }
        // dd($array);
        
        return view('father.message.create')->with('branches',$array);
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
             'title'=>'required',
            'branch'=>'required',
            'dec'=>'required',
    ];

    $customMessages = [
         'dec.required' => 'تفاصيل الرسالة مطلوبة'
    ];

    $this->validate($request, $rules, $customMessages);
    


        $fathermessage = new Fathermessage();
        $fathermessage->user_id = Auth::user()->father_id;
        $fathermessage->title = $request->title;
        $fathermessage->branch = $request->branch;
        $fathermessage->dec = $request->dec;
        if($request->file != null){
            $fathermessage->file = $request->file->store('message_file');
        }
        // dd($fathermessage);
        $fathermessage->save();
        $users= [];
$users = Admin::role('اداري')->get();


$useres = Admin::role('مدير مدرسة')->where('branch','like','%'.$fathermessage->branch.'%')->get();
foreach($useres as $user){
    $users->push($user);
}
$users = $users->unique('id');
// dd($users);

foreach ($users as $user) {
    $user->notify(new SendMessage($fathermessage));
}

return redirect()->back()->with(['success'=>'تم ارسال الرسالة بنجاح']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fathermessage  $fathermessage
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $mes = Fathermessage::with('relpays')->with('user')->find($id);
      
        return view('father.message.show')->with('message',$mes);
    }
    public function replay(Request $request){
        $mess = new Messagereplay();
        $mess->user_id = Auth::user()->father_id;
        $mess->dec = $request->dec;
        $mess->fathermessage_id = $request->fathermessage_id;
        $mess->save();
        $users = Admin::role('اداري')->get();
        $fathermessage=Fathermessage::find($mess->fathermessage_id);
        $fathermessage->view = 0;
        $fathermessage->save();
        $useres = Admin::role('مدير مدرسة')->where('branch','like','%'.$fathermessage->branch.'%')->get();
        foreach($useres as $user){
            $users->push($user);
        }
        $users = $users->unique('id');
        
        foreach ($users as $user) {
            $user->notify(new ReplyMessage($fathermessage));
        }

        return redirect()->back()->with(['success'=>'تم ارسال الرسالة بنجاح']);
    }
    public function replay_admin(Request $request){
        $mess = new Messagereplay();
        $mess->user_id = 0;
        $mess->dec = $request->dec;
        $mess->fathermessage_id = $request->fathermessage_id;
        $mess->save();
        
$fathermessage=Fathermessage::find($mess->fathermessage_id);
$user = Father::where('father_id',$fathermessage->user_id)->first();
    $user->notify(new ReplyMessageFather($fathermessage));



        
        return redirect()->back()->with(['success'=>'تم ارسال الرسالة بنجاح']);
    }
   
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fathermessage  $fathermessage
     * @return \Illuminate\Http\Response
     */
    public function edit(Fathermessage $fathermessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fathermessage  $fathermessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fathermessage $fathermessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fathermessage  $fathermessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fathermessage $fathermessage)
    {
        //
    }
}
