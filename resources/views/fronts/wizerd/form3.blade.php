<!DOCTYPE html>
<html dir="rtl" lang="en">


<head>
    <meta charset="utf-8">
    <title>تسجيل العباقرة</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('wizerd_form/css/bootstrap.min.css') }}">
     <link rel="stylesheet" href="{{asset('wizerd_form/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css') }}"> 
    <link rel="stylesheet" href="{{ asset('wizerd_form/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('wizerd_form/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('wizerd_form/css/style.css') }}">
    <style>
        
            input {
                margin-top: 0px !important;
            }
        
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="steps-area position-relative">
            <div class="image-holder">
                <img src="wizerd_form/img/side-img1.png" alt="">
            </div>
            <div class="steps clearfix">
                <ul class="tablist multisteps-form__progress">
                    <li class="multisteps-form__progress-btn  first done checked" aria-selected="false">
                        <span>1</span>
                    </li>
                    <li class="multisteps-form__progress-btn">
                        <span>2</span>
                    </li>
                    <li class="multisteps-form__progress-btn">
                        <span>3</span>
                    </li>
                    <li class="multisteps-form__progress-btn">
                        <span>4</span>
                    </li>
                    <li class="multisteps-form__progress-btn last">
                        <span>5</span>
                    </li>
                  
                </ul>
            </div>
        </div>
        <form class="multisteps-form__form " action="{{ route('st_form3') }}"  method="POST" id="wizard">
            @csrf
            <div class="form-area position-relative">
                <!-- div 1 -->
                <div class="multisteps-form__panel js-active" data-animation="animate__bounce">
                    {{--  <form class="multisteps-form__form " action="{{ route('st_form1') }}"  method="POST" id="wizard">  --}}

                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <h1 style="text-align: center;margin-bottom:5%">تسجيل العباقرة للعام الدراسي الجديد</h1>

                                    <span class="step-no bottom-line">الخطوة 3</span>
                                    <div class="step-progress float-right">
                                        <span>3 من 5 مكتمل</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 60%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="visibility: hidden;">والحجة ممارسة عادية ، يجب أن يبدو أنه انقلب. قال ممارسة كرة القدم خاتمة ، مالحة اتخذها الأب أو قرار مرح أو كرة قدم.</p>
    
                                    <h2 style="text-align: center  !important;">ثالثًا: بيانات الأم</h2>
                                    @if (count($errors) > 0)
                                  <div class="alert alert-danger">
                                   <button type="button" class="close" data-dismiss="alert">×</button>
                                   <ul>
                                    @foreach ($errors->all() as $error)
                                     <li>{{ $error }}</li>
                                    @endforeach
                                   </ul>
                                  </div>
                                 @endif
                                  
                                      <div class="form-inner-area">
                                          <div class="row">
                                              {{-- {{ dd(session()->get('step3')) }} --}}
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="text" required  value="{{ @session()->get('step3')['mother_name'] }}"  name="mother_name" placeholder="الاسم" class="required" >
  
                                              </div>
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="number" required  value="{{ @session()->get('step3')['mother_id'] }}"  name="mother_id" placeholder="رقم البطاقة الشخصية" class="required">
  
                                              </div>
                                          </div>
                                      </div>
                                      <div class="form-inner-area">
                                          <div class="row">
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="number"  required  value="{{ @session()->get('step3')['mother_phone'] }}"  name="mother_phone" placeholder="رقم الهاتف النقال" class="required">
  
                                              </div>
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="text" required  value="{{ @session()->get('step3')['mother_student'] }}"  name="mother_student" placeholder="المؤهل الدراسي" class="required">
  
                                              </div>
                                          </div>
                                      </div>
                                   
                                      <div class="form-inner-area">
                                          <div class="row">
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="text" required  value="{{ @session()->get('step3')['mother_job'] }}"  name="mother_job" placeholder="الوظيفة" class="required">
  
                                              </div>
                                              <div class="col-md-6 col-sm-12 classnew">
                                                  <input type="text" required  value="{{ @session()->get('step3')['mother_palce_job'] }}"  name="mother_palce_job" placeholder="مكان العمل" class="required">
  
                                              </div>
                                          </div>
                                      </div>
                                    
                                      
                                  </div>
                           
                          </div>
                      </div>
                      <!-- ./inner -->
                      
                        <div class="actions">
                            
                                <button id="back_to" style="background: #e6ba16;width: 100px;" class="btn btn-warning" type="button">الرجوع   </button>

                                <button type="submit" class="btn btn-info" style="width: 100px;margin-left: 10px;">التالي</button>
                                                                                
                                                                            

                       
                        </div>
                    </div>
                 
                </div>
            </form>
                <!-- div 2 -->
            
    </div>
    <script src="{{ asset('wizerd_form/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/main.js') }}"></script>
    
<script>
    $(document).ready(function () {

        $("#back_to").on("click", function(){
            window.location.replace("{{ route('form2_wizerd') }}");
          });
});
</script>
    
   
</body>


</html>