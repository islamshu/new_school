@extends('layouts.dashboard2')
@section('css_meta')
<title> {{ $review->title }}</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>تعديل : {{ $review->title }}</span></h5>
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('review.index') }}">الآراء</a>
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
                    <h4 class="card-title">{{ $review->title }}</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('review.update',$review->id) }}" enctype="multipart/form-data">
                      @csrf @method('put')
                 
                    
                  
                      <div class="row">
                        <div class="col m6 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>review</span>
                              <input class="image" type="file"  value="{{ $review->image }}"name="image">
                              
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate image-preview "   disabled  placeholder="ادخل  صورة ">
                            
                              <img src="{{ asset('uploads/'.$review->image) }}" class="image-preview" width="100px" height="70px" alt="">

                           
                            </div>
                          </div>
                      
                          
                    
                    </div>
                 
                  
                    
                   
                      <div class="row">
                        <div class="input-field ">
                          <div class="input-field col m12 s12">
                              <div>
                                  <label for="date-demo1">الرأي</label>
                              </div>
                              <textarea name="description" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">{{ $review->description }}</textarea>
                            </div>
  
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" >إرسال
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