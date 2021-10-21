@extends('layouts.dashboard2')
@section('css_meta')
<title> تعديل الصورة</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>تعديل الصورة</span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('gallery.index') }}">الألبوم</a>
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
                    <h4 class="card-title">تعديل الصورة</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form action="{{ route('gallery.update',$galles->id) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                  
                  <div class="col s12">
                    <div class="row">
                                          <div class="col m6 s12 file-field input-field">

                                                          <label style="    font-size: 19px;
                                                font-weight: 600;
                                                color: black;"  class="">بيانات الصورة</label>

                                  <input id="icon_prefix3" type="text" 
                                  value="{{ $galles->caption    }}"
                              
                                  placeholder="fa fa-envelope" name="caption" >
                                </div>
                      <div class="col m6 s12 file-field input-field">
                          <div class="btn float-right">
                            <span>اضف صورة</span>
                            <input class="image" type="file"  value="{{old('image')}}" name="image">
                            
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate image-preview "  value="{{old('image')}}" disabled  placeholder="ادخل  صورة السلايدر" >
                            <img src="{{ asset('uploads/'.$galles->image) }}" class="image-preview" width="100px" height="70px" alt="">
                      
                         
                          </div>
                        </div>
                    
                        
                  
                  </div>
                    <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" type="submit">إرسال
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