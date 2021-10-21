@extends('layouts.dashboard2')
@section('css_meta')
<title>  مهامنا</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>مهامنا</span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
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
                    <h4 class="card-title">مهامنا</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('about2.store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="input-field col m6 s12">
                        <i class="material-icons prefix">title</i>
                        <input id="icon_prefix3" type="text" value="{{ @$about->title }}" name="title" >
                        <label  class="">العنوان الاساسي </label>
                      </div>
                      
                    </div>
                    
                  
                      <div class="row">
                        <div class="col m6 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>اضف صورة</span>
                              <input class="image" type="file"  value="{{old('image')}}" name="image">
                              
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate image-preview "  value="{{old('image')}}" disabled  placeholder="ادخل  صورة " >
                              <img src="{{ asset('uploads/'.@$about->image) }}" class="image-preview" width="100px" height="70px" alt="">
                        
                           
                            </div>
                          </div>
                      
                          
                    
                    </div>
                  
                    
                   
                      <div class="row">
                        <div class="input-field ">
                          <div class="input-field col m8 s8">
                              <div>
                                  <label for="date-demo1">الوصف الاساسي</label>
                              </div>
                              <textarea name="description" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">{{ @$about->description }}</textarea>
                            </div>
  
                        </div>
                        
                    </div>
                   
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#first-input-fields" type="button" role="tab" aria-controls="home" aria-selected="true">القائمة الاولى</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#secand-input-fields" type="button" role="tab" aria-controls="profile" aria-selected="false">القائمة الثانية</button>
                      </li>
                    
                    </ul>
                   

                    
                      <div class="tab-content" id="myTabContent">
                    
                         <div class="tab-pane fade show active" id="first-input-fields" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                          <div class="col s8">
                            <div class="row">
                              <div class="input-field  col m8 s8">
                                <i class="material-icons prefix">title</i>
                                <textarea name="list1" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">{{ @$about->list1 }}</textarea>
                                <label  class="">القائمة الاولى</label>
                              </div>
                              
                            </div>
                            
                          
                           
                            
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane fade show " id="secand-input-fields" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                          <div class="input-field  col m8 s8">
                            <i class="material-icons prefix">title</i>
                            <textarea name="list2" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">{{ @$about->list2 }}</textarea>
                            <label  class="w-120">القائمة الثانية</label>
                          </div>
                          
                        </div>
                      </div>
                      </div>
                         
                        
                 
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >ارسال
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