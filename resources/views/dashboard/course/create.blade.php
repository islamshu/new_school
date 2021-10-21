@extends('layouts.dashboard2')
@section('css_meta')
<title>انشاء دورة جديدة</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>انشاء دورة  جديدة</span></h5>
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
                    <h4 class="card-title">الدورات</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('course.store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="input-field col m6 s12">
                        <i class="material-icons prefix">title</i>
                        <input id="icon_prefix3" type="text" value="{{ old('title') }}" name="title" class="validate">
                        <label for="icon_prefix3" class="">عنوان الدورة</label>
                      </div>
                      
                    </div>
                    
                  
                     
                    <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" value="{{ old('program') }}" placeholder="فوتوشوب" name="program" class="validate">
                          <label for="icon_prefix3" class="">اسم البرنامج التدريبي</label>
                        </div>
                     
                      </div>
                       <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" id="price" value="{{ old('price') }}" placeholder="10.00" name="price" class="validate">
                          <label for="price" class=""> رسوم الدورة</label>
                        </div>
                     
                      </div>
                      
                      <div class="row">
                        <div class="input-field col s6">
                          <i class="material-icons prefix">art_track</i>
                          <input id="icon_prefix3" type="text" id="address" value="{{ old('address') }}" placeholder="مسقط" name="address" class="validate">
                          <label for="address" class="">مكان الدورة</label>
                        </div>
                     
                      </div>
                    
                   
                      <div class="row">
                        <div class="input-field col s3">
                          <i class="material-icons prefix">art_track</i>
                          <input type="date" name="from" value="{{ old('from', date('Y-m-d')) }}">

                          <label for="icon_prefix3" class="">يبدأ بتاريخ </label>
                        </div>
                        <div class="input-field col s3">
                          <i class="material-icons prefix">art_track</i>
                          <input type="date" name="to" value="{{ old('to', date('Y-m-d')) }}">

                          <label for="icon_prefix3" class="">ينتهى بتاريخ </label>
                        </div>
                     
                      </div>
<!--                      <div class="row">-->
<!--                        <div class="input-field col s3">-->
<!--                          <i class="material-icons prefix">art_track</i>-->
<!--                          <select name="show" id="show">-->
<!--                            <option value="1">حضور مباشر</option>-->
<!--                            <option value="0">عن بعد</option-->
<!--                                <option value="2">مدمج </option>-->
<!-->-->
<!--                          </select>-->

<!--                          <label for="show" class="">نوع البرنامج التدريبي </label>-->
<!--                        </div>-->
                        
                     
<!--                      </div>-->
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >اضافة
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