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
                .anyClass {
  height:200px;
  overflow-y: scroll;
  width: 100%;
}
          
            input {
                margin-top: 0px !important;
            }
            @media only screen and (max-width: 600px) {
  .clssnew {
    margin-bottom:20px;
  }
            }
        
    </style>
</head>

<body onbeforeunload="locationHashChanged()">
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
        <form class="multisteps-form__form " action="{{ route('st_form5') }}"  method="POST" id="wizard">
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

                                    <span class="step-no bottom-line">الخطوة 5</span>
                                    <div class="step-progress float-right">
                                        <span>5 من 5 مكتمل</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar" style="width: 100%"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="visibility: hidden;">لحجة ممارسة عادية ، يجب أن يبدو أنه انقلب. قال ممارسة كرة القدم خاتمة ، مالحة اتخذها الأب أو قرار مرح أو كرة قدم.</p>
@php
    $st =App\Student::find(Session()->get('student_id'))
@endphp
                                  <h2 style="text-align: center  !important;">خامسًا:  الدفع</h2>
                                  
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
                                        <div class="col-md-6 col-sm-12 classnew" style="text-align: center">
                                            <label >
                        <h3>  الرسوم السنوية <span style="font-size:20px">( للعام الدراسي كامل)</span></h3>
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12 classnew">
                                            <input type="text"disabled value="{{  $st->total }}  ريال عماني">
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form-inner-area">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 classnew" style="text-align: center">
                                        <label >
                        <h3 style="font-size:18px">الرسوم الشهرية</h3>

                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 classnew">
                                    <input type="text" disabled value=" {{  $st->month_p }}  ريال عماني">
                                    </div>
                                </div>
                                  
                                    
                                </div>
                                <div class="form-inner-area">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12 classnew" style="text-align: center">
                                        <label >
                                           <h3 style="font-size:18px">دفع مقدم لضمان المقعد (يخصم من الرسوم)</h3>

                                        </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12 classnew">
                                     <input type="text" disabled value="{{  $st->fist_q }}  ريال عماني">

                                    </div>
                                </div>
                                  
                                    
                                </div>
                         
                        </div>
                           <p style="text-align: right;color: red;">* بنود الاتفاق  </p>

                        <div style="text-align: right;background: #f1f1f1; " class="anyClass " >
                            <div style="padding: 3%">
                                {!! @App\General::first()->student_roles !!}
                        </div>
                          </div>

                          <div style="text-align: right;margin-top: 10px" >
                            <input style="display: inline " type="checkbox" required >
                                   
                            <label style="font-size: 20px ; margin-bottom: 10px;display: inline "  for="scales"> <a style="color: rgb(199, 73, 73)"> أتعهد انا {{ @session()->get('step2')['father_name'] }}  , ولي أمر العبقري : {{ @session()->get('step1')['student_name'] }} , بالإلتزام بجميع البنود الواردة أعلاه . </a></label>
                          </div>
        <p style="text-align: center;color: red;">ملاحظة : يرجى الانتظار بعد عملية الدفع إلى حين انتقالك للصفحة الرئيسية</p>

                        </div>

                        <!-- /.inner -->
                      
                        <div class="actions">
                            
                                <button id="back_to" style="background: #e6ba16;width: 100px;" class="btn btn-warning" type="button">الرجوع   </button>

                             <input type="submit" name="sub" value="الانتقال للدفع" class="btn btn-info"  style="width: 100px;margin-left: 1px;">
                        <!--<input type="submit" name="sub" value="انهاء التسجيل" class="btn btn-danger" style="width: 100px;margin-left: 10px;">-->
                          
                                                                            

                       
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
                window.location.replace("{{ route('form3_wizerd') }}");
              });

 });
function locationHashChanged() {
  if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
              alert('Back button was pressed.');
                window.location='www.example.com';
                return false;
            }
          }
        });

        window.history.pushState('forward', null, './#forward');
      }
}

window.onhashchange = locationHashChanged;

    </script>
        
</body>


</html>