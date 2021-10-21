@extends('layouts.dashboard2')
@section('css_meta')
    <title>من نحن</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>  من نحن</span></h5>
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
                    <h4 class="card-title">من نحن</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('about.store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="row">
                      <div class="input-field col m6 s12">
                        <i class="material-icons prefix">title</i>
                        <input id="icon_prefix3" type="text" value="{{ @$about->main_title }}" name="main_title" >
                        <label  class="">العنوان الاساسي </label>
                      </div>
                      
                    </div>
                    
                  
                      <div class="row">
                        <div class="col m6 s12 file-field input-field">
                            <div class="btn float-right">
                              <span>صورة</span>
                              <input class="image" type="file"  value="{{old('image')}}" name="image">
                              
                            </div>
                            <div class="file-path-wrapper">
                              <input class="file-path validate image-preview "  value="{{old('image')}}" disabled  placeholder="ادخل  صورة السلايدر" >
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
                              <textarea name="main_des" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">{{ @$about->main_des }}</textarea>
                            </div>
  
                        </div>
                        
                    </div>
                    <div class="card-content">
                      <div class="card-title">
                        <div class="row">
                         
                          <div class="col s12 ">
                            <ul class="tabs">
                              <li class="tab col s3 p-0"><a class="active p-0" href="#first-input-fields">الحزء الاول</a></li>
                              <li class="tab col s3 p-0"><a class="p-0" href="#secand-input-fields">الجزء الثاني</a></li>
                              <li class="tab col s3 p-0"><a class=" p-0" href="#third-input-fields">الجزء الثالث</a></li>
                              <li class="tab col s3 p-0"><a class="p-0" href="#four-input-fields">الجزء الرابع</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div id="first-input-fields">
                        <div class="row">
                          <div class="col s12">
                            <div class="row">
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix">title</i>
                                <input id="icon_prefix3" type="text"
                                 @if ($about->title_1 == null)
                                value="{{   old('title_1')   }}"
                                @else  
                                value="{{  $about->title_1  }}"
                                @endif  
                                name="title_1" >
                                <label  class="">العنوان الاول</label>
                              </div>
                              
                            </div>
                            
                          
                           
                            <div class="row">
                                <div class="input-field col s6">
                                  <i class="material-icons prefix">art_track</i>
                                  <input id="icon_prefix3" type="text" 
                                  @if ($about->icon_1 == null)
                                  value="{{   old('icon_1')   }}"
                                  @else  
                                  value="{{  $about->icon_1  }}"
                                  @endif 
                                  placeholder="fa fa-envelope" name="icon_1" >
                                  <label  class="">الأيقونة</label>
                                </div>
                             
                              </div>
                            
                           
                              <div class="row">
                                <div class="input-field ">
                                  <div class="input-field col m8 s8">
                                      <div>
                                          <label for="date-demo1">الوصف</label>
                                      </div>
                                      <textarea name="des_1" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">
                                          
                                        @if ($about->des_1 == null)
                                       {{   old('des_1')   }}
                                        @else  
                                       {{  $about->des_1  }}
                                        @endif 
                                      </textarea>
                                    </div>
          
                                </div>
                                
                            </div>
                          </div>
                        </div>
                      </div>
                      <div id="secand-input-fields">
                        <div class="row">
                          <div class="input-field col m6 s12">
                            <i class="material-icons prefix">title</i>
                            <input id="icon_prefix3" type="text" 
                            @if ($about->title_2 == null)
                            value="{{   old('title_1')   }}"
                            @else  
                            value="{{  $about->title_2  }}"
                            @endif  
                            name="title_2" >
                            <label  class="">العنوان الثاني</label>
                          </div>
                          
                        </div>
                        
                      
                         
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">art_track</i>
                              <input id="icon_prefix3" type="text" 
                              @if ($about->icon_2 == null)
                            value="{{   old('title_1')   }}"
                            @else  
                            value="{{  $about->icon_2  }}"
                            @endif  
                               placeholder="fa fa-envelope" name="icon_2" >
                              <label  class="">الأيقونة</label>
                            </div>
                         
                          </div>
                        
                       
                          <div class="row">
                            <div class="input-field ">
                              <div class="input-field col m8 s8">
                                  <div>
                                      <label for="date-demo1">الوصف</label>
                                  </div>
                                  <textarea name="des_2" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">
                                    @if ($about->des_2 == null)
                                   {{   old('des_2')   }}
                                    @else  
                                    {{  $about->des_2  }}
                                    @endif  
                                  </textarea>
                                </div>
      
                            </div>
                            
                        </div>
                      </div>
                      <div id="third-input-fields">
                        <div class="row">
                          <div class="input-field col m6 s12">
                            <i class="material-icons prefix">title</i>
                            <input id="icon_prefix3" type="text"
                            @if ($about->title_3 == null)
                            value="{{   old('title_3')   }}"
                            @else  
                            value="{{  $about->title_3  }}"
                            @endif
                             name="title_3" >
                            <label  class="">العنوان الثالث</label>
                          </div>
                          
                        </div>
                        
                      
                         
                        <div class="row">
                            <div class="input-field col s6">
                              <i class="material-icons prefix">art_track</i>
                              <input id="icon_prefix3" type="text" 
                              @if ($about->icon_3 == null)
                              value="{{   old('icon_3')   }}"
                              @else  
                              value="{{  $about->icon_3  }}"
                              @endif
                              placeholder="fa fa-envelope" name="icon_3" >
                              <label  class="">الأيقونة</label>
                            </div>
                         
                          </div>
                        
                       
                          <div class="row">
                            <div class="input-field ">
                              <div class="input-field col m8 s8">
                                  <div>
                                      <label for="date-demo1">الوصف</label>
                                  </div>
                                  <textarea name="des_3" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">
                                    @if ($about->des_2 == null)
                                    {{   old('des_3')   }}
                                     @else  
                                     {{  $about->des_3  }}
                                     @endif 
                                  </textarea>
                                </div>
      
                            </div>
                            
                        </div>
                          </div>
                          <div id="four-input-fields">
                            <div class="row">
                              <div class="input-field col m6 s12">
                                <i class="material-icons prefix">title</i>
                                <input id="icon_prefix3" type="text" 
                                @if ($about->title_4 == null)
                                value="{{   old('title_4')   }}"
                                @else  
                                value="{{  $about->title_4  }}"
                                @endif
                                 name="title_4" >
                                <label  class="">العنوان الرابع</label>
                              </div>
                              
                            </div>
                            
                          
                             
                            <div class="row">
                                <div class="input-field col s6">
                                  <i class="material-icons prefix">art_track</i>
                                  <input id="icon_prefix3" type="text" 
                                  @if ($about->icon_4 == null)
                                value="{{   old('icon_4')   }}"
                                @else  
                                value="{{  $about->icon_4  }}"
                                @endif
                                  placeholder="fa fa-envelope" name="icon_4" >
                                  <label  class="">الأيقونة</label>
                                </div>
                             
                              </div>
                            
                           
                              <div class="row">
                                <div class="input-field ">
                                  <div class="input-field col m8 s8">
                                      <div>
                                          <label for="date-demo1">الوصف</label>
                                      </div>
                                      <textarea name="des_4" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">@if ($about->des_2 == null)
                                        {{   old('des_4')   }}
                                         @else  
                                         {{  $about->des_4  }}
                                         @endif </textarea>
                                    </div>
          
                                </div>
                                
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