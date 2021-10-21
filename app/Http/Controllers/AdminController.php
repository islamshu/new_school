<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Spatie\Permission\Models\Role;
use App\Branch;
use Hash;
use App\Admin;
use DB;
use Spatie\Permission\Models\Permission;
class AdminController extends Controller
{
    public function get_login()
    {
        return view('dashboard.partials.login');
    }
    public function post_login(Request $request)
    {

       

        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
                                    if(auth()->user()->HasRole('اداري') || auth()->user()->HasRole('مدير مدرسة') ){
            return redirect()->route('admin.dashboard');
                                    }else{
              return redirect('/madares-kings/notification');
         
                                    }
        }
      
        return redirect()->back()->with(['error' => 'هناك خطا بالبيانات']);
    }
    public function dashboard(){
        
              if(auth()->user()->HasRole('اداري') || auth()->user()->HasRole('مدير مدرسة') ){
        return view('dashboard.partials.index');
                                    }else{
              return redirect('/madares-kings/notification');
         
                                    }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('get_login');
    }
    public function create(){
        $roles = Role::pluck('name','name')->all();
      
        $branchs = Branch::get();
        return view('dashboard.users.create')->with('roles',$roles)->with('branchs',$branchs);
    }
    public function store(Request $request){
        $this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email',
'password' => 'required',
'roles_name' => 'required',
]);

$input =$request->except(['roles_name']);


$input['password'] = Hash::make($input['password']);

// $input['b/**/ranch'] = $request->input('branch');
// foreach($request->input('branch') as )
// $distribute = Admi::create($request->all());

$user = Admin::create($input);

foreach(($request->input('roles_name')) as $role){
 $user->assignRole($role);
}

// $user->assignRole($request->input('roles_name'));
// dd()/

return redirect()->route('users.index')
->with('success','تم اضافة المستخدم بنجاح');
}
public function index(){
    return view('dashboard.users.index')->with('users',Admin::get());
}
public function edit($id){
            $roles = Role::pluck('name','name')->all();
      
        $branchs = Branch::get();
    return view('dashboard.users.edit')->with('user',Admin::find($id))->with('roles',$roles)->with('branchs',$branchs);
}

public function update(Request $request, $id)
{
$this->validate($request, [
'name' => 'required',
'email' => 'required|email|unique:users,email,'.$id,
'roles_name' => 'required'
]);
$request_all = $request->except(['password']);
if($request->password !=null){
   $request_all['password'] = Hash::make($request->password);
}

$user = Admin::find($id);
$user->update($request_all);
DB::table('model_has_roles')->where('model_id',$id)->delete();
foreach(($request->input('roles_name')) as $role){
 $user->assignRole($role);
}return redirect()->route('users.index')
->with('success','تم تحديث معلومات المستخدم بنجاح');
}
public function destroy($id){
  $user = Admin::find($id);
  $user->delete();
     return redirect()->route('users.index')
                                 ->with('success','تم حذف المتسخدم');

  
}
}
