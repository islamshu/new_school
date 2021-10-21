@extends('layouts.dashboard2')
@section('css_meta')
<title>تعديل {{ $course -> title }}</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span> تعديل {{ $course -> title }}  </span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">الدورات</a>
                </li>
              </ol>
            </div>
          
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col s12">
          <div id="basic-demo" class="card card-tabs">
            <div class="card-content">
              <div class="card-title">
                <div class="row">
                  <div class="col s12 m6 l10">
                    <h4 class="card-title">تعديل {{ $course -> title }}</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('course.update',$course->id) }}" enctype="multipart/form-data">
                    @method('put')
                      @csrf
                    <div class="row">
                      <div class="input-field col m6 s12">
                        <i class="material-icons prefix">title</i>
                        <input id="icon_prefix3" type="text" value="{{ $course->title }}" name="title" class="validate">
                        <label for="icon_prefix3" class="">عنوان الدورة</label>
                      </div>
                      
                    </div>
                    
                  
                     
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" value="{{ $course->program }}" placeholder="فوتوشوب" name="program" class="validate">
                          <label for="icon_prefix3" class="">اسم البرنامج التدريبي</label>
                        </div>
                     
                      </div>
                      
                          <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" id="price" value="{{$course->price }}" placeholder="10.00" name="price" class="validate">
                          <label for="price" class="">رسوم الدورة </label>
                        </div>
                     
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" id="address" value="{{$course->address  }}" placeholder="مسقط" name="address" class="validate">
                          <label for="address" class="">مكان الدورة</label>
                        </div>
                     
                      </div>
                    
                   
                      <div class="row">
                        <div class="input-field col s3">
                          <i class="material-icons prefix">art_track</i>
                          <input type="date" name="from" value="{{ $course->from }}">

                          <label for="icon_prefix3" class="">يبدأ بتاريخ </label>
                        </div>
                        <div class="input-field col s3">
                          <i class="material-icons prefix">art_track</i>
                          <input type="date" name="to"value="{{ $course->to }}">

                          <label for="icon_prefix3" class="">ينتهى بتاريخ </label>
                        </div>
                     
                      </div>
                      <!--<div class="row">-->
                      <!--  <div class="input-field col s3">-->
                      <!--    <i class="material-icons prefix">art_track</i>-->
                      <!--    <select name="show" id="show">-->
                      <!--      <option value="1" {{ $course->show == 1 ? 'selected' : '' }}>حضور مباشر</option>-->
                            
                      <!--      <option value="0" {{ $course->show == 0 ? 'selected' : '' }}>عن بعد</option>-->
                      <!--      <option value="2" {{ $course->show == 2 ? 'selected' : '' }}>مدمج </option>-->

                      <!--    </select>-->

                      <!--    <label for="show" class="">نوع البرنامج التدريبي </label>-->
                      <!--  </div>-->
                        
                     
                      <!--</div>-->
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >تعديل
                              <i class="material-icons right">send</i>
                            </button>
                          </div>
                    </div>
                    
                  
                  </form>
                </div>
              </div>
            
            </div>
          </div>
        </div>
      </div>









    

@endsection