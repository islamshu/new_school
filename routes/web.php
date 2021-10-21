<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/pass','HomeController@index');
Route::get('/', function () {
  $exitCode = Artisan::call('cache:clear');
    return view('fronts.part.index');
})->name('front');
Route::get('/98544', function () {
Session()->flush();

        return redirect('/');
});
    Route::post('test','HomeController@price')->name('price_con');
    Route::post('calcol','HomeController@cal')->name('date_count');
    Route::post('pranch','HomeController@branch')->name('pranch');
    Route::post('stage','HomeController@stage')->name('stage');
    Route::post('get_stage','HomeController@get_stage')->name('get_stage');
    Route::post('parice_test','HomeController@parice_test')->name('parice_test');
    Route::post('register_student','HomeController@register_student')->name('register_student');
    Route::resource('register_co', 'RegisterCourseController');
    Route::get('course', 'RegisterCourseController@course')->name('course');
    Route::get('job', 'JobController@index')->name('job.index');
    Route::post('job', 'JobController@store')->name('job.store');
     Route::get('user_not','HomeController@user_not_read')->name('user_not_read');
    Route::get('user_not/{userid}','HomeController@user_not')->name('user_not');
Route::get('/thawani/cancel','ThawaniController@errorUrl')->name('thawani.cancel');
Route::get('/thawani/done','ThawaniController@successUrl')->name('thawani.done');
Route::get('/thawani/father/cancel/{id}','ThawaniController@errorfatherUrl')->name('thawani.father.cancel');
Route::get('/thawani/father/done/{id}','ThawaniController@successfatherUrl')->name('thawani.father.done');
Route::get('croun-job','HomeController@croun_job');
Route::get('croun-job_two','HomeController@croun_job_tow');
Route::get('chech_paid','HomeController@chech_paid');

Route::get('loign_to_father','HomeController@loignn');
Route::post('check_id','ReStConroller@check_id')->name('check_id_for_student');



Route::post('job_apllication','AddJobContoller@store_job')->name('job_apllication');

    
   


   
Route::group(['middleware' => ['auth:father'],'prefix' => 'father'],function () {
Route::get('/','FatherController@dashboard')->name('father_dashboard');
Route::get('/logout','FatherController@logout')->name('father_logout');
Route::resource('send-message','FathermessageController');
Route::post('send-replay','FathermessageController@replay')->name('message.replay');
Route::get('payments/{id}','FatherController@all_paids')->name('payments.all_paids');
Route::post('payments','FatherController@test_piad')->name('test_piad');
Route::get('all_bills','FatherController@all_bills')->name('all_bills');
Route::get('bills_show/{id}','FatherController@bills_show')->name('bills.show');
Route::get('student_show/{id}','FatherController@student_show')->name('student_show.show');
Route::post('change_password_send','FatherController@change_pass')->name('change_pass.father');
Route::get('change_password','FatherController@change_pass_get')->name('change_pass.father_get');
    Route::get('student/print/{id}','StudentController@print')->name('pdf.print');
    Route::get('pill/print/{id}','FatherController@print')->name('pdf.print_pill');
     Route::get('user_not','FatherController@user_not_read')->name('father.user_not_read');
    Route::get('user_not/{userid}','FatherController@user_not')->name('father.user_not');





});
  
Route::group(['middleware' => ['auth'],'prefix' => 'madares-kings'], function() {
    Route::get('/','AdminController@dashboard')->name('admin.dashboard');
    
    Route::post('get_stage_admin','StudentController@get_stage_admin')->name('get_stage_admin');
    Route::post('change_stage','StudentController@change_stage')->name('change_stage');
        Route::post('check_paid/{id}','StudentController@check_paid')->name('check_paid');
        Route::post('student_paids/{session}','StudentController@student_paids')->name('student_paids');

    Route::group(['middleware' => ['role:اداري']], function() {
    

    Route::get('show_bill_studnet/{id}','ReStConroller@show_bill_studnet')->name('show_bill_studnet');

    
    
    Route::get('/config','ConfigController@edit')->name('config.edit');
    
    Route::get('test', function() {
        return view('fronts.firstform');
    });
    Route::post('job', 'JobController@store')->name('job.store');
    
    Route::resource('job_app', 'JobController')->except(['index','store']);
    
    Route::get('job_app', 'JobController@index2')->name('job_app1.index');
    Route::delete('job_app/{id}', 'JobController@destroy')->name('job_app1.destroy');

    Route::get('loign_to_father/{id}','HomeController@loign_to_father')->name('father.login_access');

    Route::get('fathers','HomeController@get_fathers')->name('father.index');

    Route::resource('employes', 'EmployeeController');

    Route::get('employes_finish', 'EmployeeController@index2')->name('employes.index2');
    Route::post('redestroy/{id}', 'EmployeeController@redestroy')->name('employes.redestroy');
    Route::get('employee/print/{id}','EmployeeController@print')->name('employee.print');

        Route::get('student/pill/{id}','StudentController@show_pains')->name('studnet.pill');


    
    Route::post('/config','ConfigController@update')->name('config.update');
    
    Route::resource('slider', 'SliderController');
    Route::get('slider/status/update', 'SliderController@updateStatus')->name('slider.update.status');
    Route::resource('service', 'ServiceController');
    Route::get('service/status/update', 'ServiceController@updateStatus')->name('service.update.status');
    Route::resource('study', 'StudyController');
    Route::get('study/status/update', 'StudyController@updateStatus')->name('study.update.status');
    Route::resource('review', 'ReviewController');
    Route::get('review/status/update', 'ReviewController@updateStatus')->name('review.update.status');
    Route::get('course/status/update', 'CourseController@updateStatus')->name('course.update.status');



    Route::resource('users','AdminController');
    Route::resource('about', 'AboutController');
    Route::resource('about2', 'About2Controller');
    Route::resource('general', 'GeneralController');
    Route::resource('branches', 'BranchController');
    Route::get('branche_update_status', 'BranchController@update_status')->name('branch.update.status');

    
    Route::resource('stages', 'StageController');
    Route::resource('price', 'PriceController');
    Route::resource('course', 'CourseController'); 
    Route::resource('gallery', 'GalleryController'); 
    Route::resource('roles','RoleController');

    });
            Route::resource('class','ClassStudentController');
            Route::get('class/create/{branch}/{stage}','ClassStudentController@get_classes')->name('get_classes');
            Route::get('studnet/show/{class}','ClassStudentController@get_student_show_class')->name('get_student_show_class');
            Route::get('create/class/{id}','ClassStudentController@create_class')->name('create_class');

            

            
            Route::get('studnet/create/{class}','ClassStudentController@get_studnet')->name('get_student_class');
            Route::post('add/studnet/class','ClassStudentController@add_student')->name('add_studnet_class');
            Route::post('remove/studnet/class','ClassStudentController@remove_student')->name('remove_studnet_class');


        Route::get('student/print/{id}','StudentController@print')->name('student.print');
    Route::get('course/print/{id}','RegisterCourseController@print')->name('course.print');
    Route::get('job/print/{id}','JobController@print')->name('job.print');
        Route::resource('studnets', 'StudentController');
    Route::get('father-send-message','FathermessageController@admin_meesage')->name('all_meesgae');
    Route::get('father-send-message/{id}','FathermessageController@show_admin_message')->name('show_admin_message');
    Route::post('send-replay','FathermessageController@replay_admin')->name('message.replay_admin');
        Route::post('refresh','StudentController@refresh')->name('refresh.paid');
        Route::get('withdrawn','StudentController@withdrawn')->name('student.withdrawn');
        Route::get('withdrawnSt','StudentController@withdrawnStudent')->name('student.withdrawnStudent');


 Route::get('report','StudentController@report');
 Route::get('notification',function() {
    return view('dashboard.notofication');
})->name('dashboard.notofication');

    Route::get('report/search','StudentController@search')->name('student.search');
    
    
    Route::get('/logout','AdminController@logout' )->name('admin.logout');
    Route::get('student_course_paid', 'RegisterCourseController@paid')->name('course.paid');
    Route::get('student_course_unpaid', 'RegisterCourseController@unpaid')->name('course.unpaid');
    Route::get('student_course/{id}', 'RegisterCourseController@show')->name('course_student.show');
    Route::delete('student_course/{id}', 'RegisterCourseController@destroy')->name('course_student_destroy');
    Route::get('studnets_un_paid', 'StudentController@unpid')->name('st_unpid');

    

});
Route::group(['prefix' => 'madares-kings'], function() {
    Route::get('/login','AdminController@get_login' )->name('get_login');
    Route::post('/login','AdminController@post_login' )->name('post_login');


});





Route::get('/father-login','FatherController@get_login' )->name('father.get_login');
Route::post('/father-login','FatherController@post_login' )->name('father.post_login');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/wizerd', 'HomeController@index')->name('home');

Route::get('register-student', function() {
    return view('fronts.wizerd');
})->name('wizeerd');

Route::get('father_rest_password','FatherController@get_restet')->name('get_restet');

Route::post('father_rest_password','FatherController@post_restet')->name('father.reset_password');

Route::post('rest_password_done','FatherController@send_otp')->name('send_otp');


Route::post('/store_form1', 'ReStConroller@store_form1')->name('st_form1');
Route::post('/store_form2', 'ReStConroller@store_form2')->name('st_form2');
Route::post('/store_form3', 'ReStConroller@store_form3')->name('st_form3');
Route::post('/store_form4', 'ReStConroller@store_form4')->name('st_form4');
Route::post('/store_form5', 'ReStConroller@store_student')->name('st_form5');
Route::get('student_done','ReStConroller@done')->name('done');
Route::get('remove','HomeController@remove');


Route::get('/thawani/cancel','ThawaniController@errorUrl')->name('thawani.cancel');
Route::get('/thawani/done','ThawaniController@successUrl')->name('thawani.done');
Route::get('/course/done/{id}','ThawaniController@successCoueseUrl')->name('course.done');
Route::get('/course/cancel','ThawaniController@errorCoueseUrl')->name('course.cancel');


Route::get('/get_form2', 'ReStConroller@store_form1')->name('st_form1');

Route::get('get_form2', function() {
    return view('fronts.wizerd.form2');
})->name('form2_wizerd');
Route::get('get_form3', function() {
    return view('fronts.wizerd.form3');
})->name('form3_wizerd');
Route::get('get_form4', function() {
    return view('fronts.wizerd.form4');
})->name('form4_wizerd');
Route::get('form5_wizerd', function() {
    return view('fronts.wizerd.form5');
})->name('form5_wizerd');


