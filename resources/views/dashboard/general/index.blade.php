@extends('layouts.dashboard2')
@section('css_meta')
<title>البيانات العامة</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <h5 class="breadcrumbs-title mt-0 mb-0 display-inline hide-on-small-and-down"><span>البيانات العامة</span></h5>
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
                    <h4 class="card-title">البيانات العامة</h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  <form class="col s12" method="post" action="{{ route('general.store') }}" enctype="multipart/form-data">
                      @csrf
                    
                    <div class="card-content">
                      <div class="card-title">
                        <div class="row">
                          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#first-input-fields" type="button" role="tab" aria-controls="pills-home" aria-selected="true">الرئيسية</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#secand-input-fields" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">الجزء السفلي</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#third-input-fields" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">مجمل البيانات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#four-input-fields" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">إعدادات الدراسة</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#five-input-fields" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">بنود م قبل الدفع</button>
                            </li>
                          </ul>
                          <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="first-input-fields" role="tabpanel" aria-labelledby="pills-home-tab">
                              <div class="row">
                              <div class="col s12">
                                <div class="row">
                                  <div class="input-field col m6 s12">
                                    <i class="material-icons prefix">navigate_before</i>
                                    <input id="first_menu" type="text"
                                     @if (@$general->first_menu == null)
                                    value="{{   old('first_menu')   }}"
                                    @else  
                                    value="{{  @$general->first_menu  }}"
                                    @endif  
                                    name="first_menu" >
                                    <label for="first_menu"  class="">اسم القائمة الاولى</label>
                                  </div>
                                  
                                </div>
                                
                              
                               
                                <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="secand_menu" type="text" 
                                      @if (@$general->secand_menu == null)
                                      value="{{   old('secand_menu')   }}"
                                      @else  
                                      value="{{  @$general->secand_menu  }}"
                                      @endif 
                                      name="secand_menu" >
                                      <label  for="secand_menu"   class="">اسم القائمة الثانية</label>
                                    </div>
                                 
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="third_menu" type="text" 
                                      @if (@$general->third_menu == null)
                                      value="{{   old('third_menu')   }}"
                                      @else  
                                      value="{{  @$general->third_menu  }}"
                                      @endif 
                                      name="third_menu" >
                                      <label for="third_menu"  class="">اسم القائمة الثالثة</label>
                                    </div>
                                 
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="seven_menu" type="text" 
                                      @if (@$general->seven_menu == null)
                                      value="{{   old('seven_menu')   }}"
                                      @else  
                                      value="{{  @$general->seven_menu  }}"
                                      @endif 
                                      name="seven_menu" >
                                      <label for="seven_menu"  class="">اسم القائمة الرابعة</label>
                                    </div>
                                 
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="fourth_menu" type="text" 
                                      @if (@$general->fourth_menu == null)
                                      value="{{   old('fourth_menu')   }}"
                                      @else  
                                      value="{{  @$general->fourth_menu  }}"
                                      @endif 
                                      name="fourth_menu" >
                                      <label for="fourth_menu"  class="">اسم القائمة الخامسة</label>
                                    </div>
                                     <div class="input-field col s6">
    
                                  <div class="switch">
                                    <label>
                                      
                                      <input id="student_show" data-id="{{ $general->student_form }}" {{ $general->student_form == 1 ? 'checked' : '' }}  type="checkbox">
                                      <span class="lever"></span>
                                      
                                    </label>
                                  </div>
                                 
                                  </div>
                                 
                                  </div>
                                    <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="eight_menu" type="text" 
                                      @if ($general->eight_menu == null)
                                      value="{{   old('eight_menu')   }}"
                                      @else  
                                      value="{{  @$general->eight_menu  }}"
                                      @endif 
                                      name="eight_menu" >
                                      <label for="eight_menu"  class="">اسم القائمة السادسة</label>
                                    </div>
                                     <div class="input-field col s6">
    
                                  <div class="switch">
                                    <label>
                                      
                                      <input id="course_show" data-id="{{ $general->is_show_course }}" {{ $general->is_show_course == 1 ? 'checked' : '' }}   type="checkbox">
                                      <span class="lever"></span>
                                      
                                    </label>
                                  </div>
                                 
                                  </div>
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="five_menu" type="text" 
                                      @if (@$general->five_menu == null)
                                      value="{{   old('five_menu')   }}"
                                      @else  
                                      value="{{  @$general->five_menu  }}"
                                      @endif 
                                      name="five_menu" >
                                      <label for="five_menu"  class="">اسم القائمة السابعة</label>
                                    </div>
                                     <div class="input-field col s6">
    
                                  <div class="switch">
                                    <label>
                                      
                                      <input id="job_show" data-id="{{ $general->job_form }}" {{ $general->job_form == 1 ? 'checked' : '' }}   type="checkbox">
                                      <span class="lever"></span>
                                      
                                    </label>
                                  </div>
                                 
                                  </div>
                                 
                                  </div>
                                  <div class="row">
                                    <div class="input-field col s6">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="six_menu" type="text" 
                                      @if (@$general->six_menu == null)
                                      value="{{   old('six_menu')   }}"
                                      @else  
                                      value="{{  @$general->six_menu  }}"
                                      @endif 
                                      name="six_menu" >
                                      <label for="six_menu"  class="">اسم القائمة الثامنة</label>
                                    </div>
                                 
                                  </div>
                                
                               
                                 
                              </div>
                            </div>
                          </div>
                            <div class="tab-pane fade" id="secand-input-fields" role="tabpanel" aria-labelledby="secand-input-fields">

                              <div class="row">
                                <div class="input-field ">
                                  <div class="input-field col m8 s8">
                                      <div>
                                          <label for="date-demo1">الوصف</label>
                                      </div>
                                      <textarea name="description" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">@if (@$general->description == null)
                                        {{   old('description')   }}
                                         @else  
                                         {{ @$general->description }}
                                         @endif </textarea>
                                
                                    </div>
          
                                </div>
                                
                              </div>
      
                              <div class="row">
                                <div class="input-field col m6 s12">
                                  <i class="material-icons prefix">navigate_before</i>
                                  <input id="first_socail" type="text"
                                   @if (@$general->first_socail == null)
                                  value="{{   old('first_socail')   }}"
                                  @else  
                                  value="{{  @$general->first_socail  }}"
                                  @endif  
                                  name="first_socail" >
                                  <label for="first_socail"  class="">رابط الفيس بوك</label>
                                </div>
                                
                              </div>
                              
                            
                             
                              <div class="row">
                                  <div class="input-field col s6">
                                    <i class="material-icons prefix">navigate_before</i>
                                    <input id="secand_socail" type="text" 
                                    @if (@$general->secand_socail == null)
                                    value="{{   old('secand_socail')   }}"
                                    @else  
                                    value="{{  @$general->secand_socail  }}"
                                    @endif 
                                    name="secand_socail" >
                                    <label for="secand_socail"  class="">رابط التويتر</label>
                                  </div>
                               
                                </div>
                                <div class="row">
                                  <div class="input-field col s6">
                                    <i class="material-icons prefix">navigate_before</i>
                                    <input id="third_socail" type="text" 
                                    @if (@$general->third_socail == null)
                                    value="{{   old('third_socail')   }}"
                                    @else  
                                    value="{{  @$general->third_socail  }}"
                                    @endif 
                                    name="third_socail" >
                                    <label for="third_socail"  class="">رابط الانستجرام</label>
                                  </div>
                               
                                </div>
                                <div class="row">
                                  <div class="input-field col s6">
                                    <i class="material-icons prefix">navigate_before</i>
                                    <input id="fourth_socail" type="text" 
                                    @if (@$general->fourth_socail == null)
                                    value="{{   old('fourth_socail')   }}"
                                    @else  
                                    value="{{  @$general->fourth_socail  }}"
                                    @endif 
                                    name="fourth_socail" >
                                    <label for="fourth_socail"  class="">رقم الواتس اب</label>
                                  </div>
                               
                                </div>
                            </div>
                            <div class="tab-pane fade" id="third-input-fields" role="tabpanel" aria-labelledby="third-input-fields"><fieldset style="margin-bottom: 30px">
                              <legend>القسم الاول</legend>
                            <div class="col-12">
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="first_sec_title" type="text"
                                 @if (@$general->first_sec_title == null)
                                value="{{   old('first_sec_title')   }}"
                                @else  
                                value="{{  @$general->first_sec_title  }}"
                                @endif  
                                name="first_sec_title" >
                                <label for="first_sec_title" class="">العنوان في القسم الاول</label>
                              </div>
                            
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="first_sec_title" type="text"
                                 @if (@$general->first_sec_link_title == null)
                                value="{{   old('first_sec_link_title')   }}"
                                @else  
                                value="{{  @$general->first_sec_link_title  }}"
                                @endif  
                                name="first_sec_link_title" >
                                <label for="first_sec_link_title" class="">نص الزر في القسم الاول</label>
                              </div>
                              
                            
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="first_sec_title" type="text"
                                 @if (@$general->first_sec_link == null)
                                value="{{   old('first_sec_link_title')   }}"
                                @else  
                                value="{{  @$general->first_sec_link  }}"
                                @endif  
                                name="first_sec_link" >
                                <label for="first_sec_link" class="">رابط الزر في القسم الاول</label>
                              </div>
                              
                            </div>
                            </fieldset>
                            
                          
                            <fieldset style="margin-bottom: 30px">
                              <legend>القسم الثاني</legend>
                            <div class="row" >
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="secand_sec_title" type="text"
                                 @if (@$general->secand_sec_title == null)
                                value="{{   old('secand_sec_title')   }}"
                                @else  
                                value="{{  @$general->secand_sec_title  }}"
                                @endif  
                                name="secand_sec_title" >
                                <label for="secand_sec_title" class="">العنوان في القسم الثاني</label>
                              </div>  
                            </div>
                          </fieldset>
                          <fieldset style="margin-bottom: 30px">
                            <legend>القسم الثالث</legend>
                            <div class="col-12">
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="third_sec_title" type="text"
                                 @if (@$general->third_sec_title == null)
                                value="{{   old('third_sec_title')   }}"
                                @else  
                                value="{{  @$general->third_sec_title  }}"
                                @endif  
                                name="third_sec_title" >
                                <label for="third_sec_title" class="">العنوان في القسم الثالث</label>
                              </div>
                            
                           
                              
                            </div>
                          </fieldset>
                          
                          
                          <fieldset style="margin-bottom: 30px">
                            <legend>القسم الرابع</legend>
                            <div class="col-12">
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="four_sec_title" type="text"
                                 @if (@$general->four_sec_title == null)
                                value="{{   old('four_sec_title')   }}"
                                @else  
                                value="{{  @$general->four_sec_title  }}"
                                @endif  
                                name="four_sec_title" >
                                <label for="four_sec_title" class="">العنوان في القسم الرابع</label>
                              </div>
                            
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="four_sec_title" type="text"
                                 @if (@$general->four_sec_title == null)
                                value="{{   old('four_sec_title')   }}"
                                @else  
                                value="{{  @$general->four_sec_title  }}"
                                @endif  
                                name="four_sec_title" >
                                <label for="four_sec_title" class="">نص الزر في القسم الرابع</label>
                              </div>
                              
                            
                            
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="four_sec_link" type="text"
                                 @if (@$general->four_sec_link == null)
                                value="{{   old('four_sec_link')   }}"
                                @else  
                                value="{{  @$general->four_sec_link  }}"
                                @endif  
                                name="four_sec_link" >
                                <label for="four_sec_link" class="">رابط الزر في القسم الرابع</label>
                              </div>
                              
                            </div>
                          </fieldset>
                          <fieldset style="margin-bottom: 30px">
                            <legend>تم التطوير</legend>
                            <div class="row" >
                              <div class="input-field col m4 ">
                                <i class="material-icons prefix">navigate_before</i>
                                <input id="develop_by" type="text"
                                 @if (@$general->develop_by == null)
                                value="{{   old('develop_by')   }}"
                                @else  
                                value="{{  @$general->develop_by  }}"
                                @endif  
                                name="develop_by" >
                                <label for="develop_by" class="">تم التطوير بواسطة </label>
                              </div>  
                            </div>
                          </fieldset>
                           <fieldset style="margin-bottom: 30px">
                            <legend>Form الدورات</legend>
                            <div class="row">
                             
                                <div class="col m6 s12 file-field input-field">
                                  <div class="btn float-right">
                                    <span>اضف صورة</span>
                                    <input class="image" type="file" name="course_image">
                                  </div>
                                  <div class="file-path-wrapper">
                                    <input class="file-path validate " value="{{old('logo')}}" disabled  placeholder="ادخل شعار النظام" type="text">
                                    <img src="{{ asset('uploads/'.$general ->course_image ) }}" class="image-preview" width="100px" height="70px" alt="">
                          
                                  </div>
                                </div>
                                
                          
                          </div>
                          </fieldset></div>
                            <div class="tab-pane fade" id="four-input-fields" role="tabpanel" aria-labelledby="four-input-fields">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="row">
                                    <div class="input-field col m6 s12">
                                      <i class="material-icons prefix">navigate_before</i>
                                      <input id="first_menu" type="date"
                                       @if (@$general->study_date == null)
                                      value="{{   old('study_date', date('Y-m-d'))   }}"
                                      @else  
                                       value="{{ $general->study_date }}"
                                      @endif  
                                      name="study_date" >
                                      <label for="study_date"  class="">تاريخ بدء الدراسة  </label>
                                    </div>
                                     
                                  </div>
                        
                                  
                                 
                                   
                                </div>
                              </div>
                            </div>
                            <div class="tab-pane fade" id="five-input-fields" role="tabpanel" aria-labelledby="five-input-fields"><div class="row">
                              <div class="col s12">
                              <div class="col m12 s12 file-field input-field">
                                <textarea name="student_roles" id="ckeditor" class="form-control ckeditor" cols="30" rows="10">@if (@$general->description == null)
                                  {{   old('student_roles')   }}
                                   @else  
                                   {{ @$general->student_roles }}
                                   @endif </textarea>
                                <label for="study_date"  class="">إعدادات بنود ما قبل الدفع </label>
                                </div>
                      
                                
                               
                                 
                              </div>
                            </div></div>

                          </div>
                        
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
@section('script')

    <script>
    $('#course_show').change(function () {
        let is_show_course = $(this).prop('checked') === true ? 1 : 0;

        $.ajax({
                   type: "post",
            dataType: "json",
            url: '{{ route('general.store') }}',
            data: {"_token": "{{csrf_token()}}", 'is_show_course': is_show_course},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
    $('#job_show').change(function () {
        let job_form = $(this).prop('checked') === true ? 1 : 0;

        $.ajax({
                   type: "post",
            dataType: "json",
            url: '{{ route('general.store') }}',
            data: {"_token": "{{csrf_token()}}", 'job_form': job_form},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
     $('#student_show').change(function () {
        let student_form = $(this).prop('checked') === true ? 1 : 0;

        $.ajax({
                   type: "post",
            dataType: "json",
            url: '{{ route('general.store') }}',
            data: {"_token": "{{csrf_token()}}", 'student_form': student_form},
            success: function (data) {
                console.log(data.message);
            }
        });
    });
</script>

@endsection
