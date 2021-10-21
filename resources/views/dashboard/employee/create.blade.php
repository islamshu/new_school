@extends('layouts.dashboard2')
@section('css_meta')
<title>إضافة موظف</title>

@endsection
@section('content')
    

      <div class="breadcrumbs-inline pt-3 pb-1" id="breadcrumbs-wrapper">
        <!-- Search for small screen-->
        <div class="container">
          <div class="row">
            <div class="col s10 m6 l6 breadcrumbs-left">
              <ol class="breadcrumbs mb-0">
               

                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">الرئيسية</a>
                    <li class="breadcrumb-item"><a href="{{ route('employes.index') }}"> الموظفين</a>
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
                    <h4 class="card-title">إضافة موظف </h4>
                  </div>
                
                </div>
              </div>
              <div id="view-basic-demo">
                <div class="row">
                  @include('dashboard.partials.success')
                  @include('dashboard.partials.error')
                  @include('dashboard.partials.errorr')
                  <form class="col s12" method="post" action="{{ route('employes.store') }}">
                      @csrf 
                    <div class="row">
                      <div class="input-field col m5 s12">
                     <input id="name" type="text"
                          value="{{   old('name')   }}"
                       required
                          name="name" >
                        <label for="name" class="">الاسم </label>
                      </div>
                        <div class="input-field col m5 s12">
                     <input id="nationality" type="text"
                          value="{{   old('nationality')   }}"
                       required
                          name="nationality" >
                        <label for="nationality" class="">الجنسية </label>
                      </div>
                      
                    </div>
                    
                    
                    
                      <div class="row">
                      <div class="input-field col m5 s12">
                    <select required  name="social_status">
                              <option value="1"   @if(old('social_status') == 1)   selected  @endif>عزباء</option>
                              <option value="2"   @if(old('social_status') == 2)   selected  @endif >متزوجة</option>
                              <option value="3"   @if(old('social_status') == 3)   selected  @endif >مطلقة</option>
                              <option value="4"   @if(old('social_status') == 4)   selected  @endif >أرملة</option>


                        </select>
                        <label for="social_status" class="">الحالة الأجتماعية </label>
                      </div>
                        <div class="input-field col m5 s12">
                     <input required id="address" type="text"
                          value="{{   old('address')   }}"
                       
                          name="address" >
                        <label for="address" class=""> العنوان</label>
                      </div>
                      
                    </div>
                     <div class="row">
                      <div class="input-field col m5 s12">
                   <input required id="date" type="date"
                          value="{{   old('dob')   }}"
                       
                          name="dob" >
                        <label for="date" class="">تاريخ الميلاد </label>
                      </div>
                        <div class="input-field col m5 s12">
                     <input required id="id_number" type="number"
                          value="{{   old('id_number')   }}"
                       
                          name="id_number" >
                        <label for="id_number" class=""> الرقم المدني</label>
                      </div>
                      
                    </div>
                    
                    
                        <div class="row">
                      <div class="input-field col m5 s12">
                   <input required id="job" type="text"
                          value="{{   old('job')   }}"
                       
                          name="job" >
                        <label for="job" class="">الوظيفة  </label>
                      </div>
                        <div class="input-field col m5 s12">
                       <select  required name="branch_id">
                        <option value="1"  >عبري</option>
                            <option value="2"     >عبري 2</option>
                            <option value="3"    >المعبيلة</option>
                            <option value="4"     >المعبيلة حلقة اولى (1-4)</option>
                            <option value="5"    >الهيال</option>
                            <option value="6"    >الموالح</option>
                        </select>
                        <label for="branch_id" class=""> الفرع </label>
                      </div>
                      
                    </div>
                    
                      <div class="row">
                      <div class="input-field col m5 s12">
                   <input required id="helth_status" type="text"
                          value="{{   old('helth_status')   }}"
                       
                          name="helth_status" >
                        <label for="helth_status" class="">الحالة الصحية  </label>
                      </div>
                        <div class="input-field col m5 s12">
                     <input required id="start_job" type="date"
                          value="{{   old('start_job')   }}"
                       
                          name="start_job" >
                        <label for="start_job" class=""> تاريخ بدء العمل </label>
                      </div>
                      
                    </div>
                     <div class="row">
                      <div class="input-field col m5 s12">
                   <input  id="rate" type="text"
                          value="{{   old('rate')   }}"
                       
                          name="rate" >
                        <label for="rate" class="">مستوى الآداء   </label>
                      </div>
                       <div class="input-field col m5 s12">
                   <input required id="qualification" type="text"
                          value="{{   old('qualification')   }}"
                       
                          name="qualification" >
                        <label for="qualification" class="">المؤهل الدراسي    </label>
                      </div>
                      
                    </div>
                      <div class="row">
                      <div class="input-field col m5 s12">
                   <input required id="salary" type="text"
                          value="{{   old('salary')   }}"
                       
                          name="salary" >
                        <label for="salary" class=""> الراتب   </label>
                      </div>
                    
                      
                    </div>
                    <div class="row">
                        <div class="input-field ">
                          <div class="input-field col m8 s12">
                              <div>
                                  <label for="date-demo1">الخبرات العملية </label>
                              </div>
                              <textarea required name="experience" id="ckeditor" class="form-control ckeditor" cols="30" rows="5">{{   old('experience')   }}</textarea>
                            </div>
  
                        </div>
                        
                    </div>
                    
                      <div class="row">
                        <div class="input-field ">
                          <div class="input-field col m8 s12">
                              <div>
                                  <label for="date-demo1">الدورات  </label>
                              </div>
                              <textarea required name="courses" id="ckeditor" class="form-control ckeditor" cols="30" rows="5">{{   old('courses')   }}</textarea>
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