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
            @media only screen and (max-width: 600px) {
  .clssnew {
    margin-bottom:20px;
  }
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
        <form class="multisteps-form__form " action="{{ route('st_form1') }}" method="POST" id="wizard">
            @csrf
            <div class="form-area position-relative">
                <!-- div 1 -->
                <div class="multisteps-form__panel js-active" data-animation="animate__bounce">

                    <div class="wizard-forms">
                        <div class="inner pb-100 clearfix">
                            <div class="form-content pera-content">
                                <div class="step-inner-content">
                                    <h1 style="text-align: center;margin-bottom:5%">تسجيل العباقرة للعام الدراسي الجديد</h1>
                                    <span class="step-no bottom-line">الخطوة 1</span>
                                    <div class="step-progress float-right">
                                
                                        <span>1 من 5 مكتمل</span>
                                        <div class="step-progress-bar">
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                        </div>
                                    </div>
                                  <h2 style="text-align: center  !important;">أولُا : بيانات العبقري</h2>
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


                                            <div class="col-md-6 col-sm-12 classnew">
                                                <input type="text" required
                                                    value="{{ @session()->get('step1')['student_name'] }}"
                                                    name="student_name" placeholder="اسم العبقري الثلاثي"
                                                    class="required">

                                            </div>
                                            
                                            <div class="col-md-6 col-sm-12 classnew">
                                                <input type="text" required
                                                    value="{{ @session()->get('step1')['student_tribe'] }}"
                                                    name="student_tribe" placeholder="القبيلة" class="required">

                                            </div>
                                          


                                        </div>
                                    </div>
                                    <div class="form-inner-area">
                                        <div class="row">


                                              <div class="col-md-6 col-sm-12 classnew">
                                                <input type="number" id="student_id_number" is_student="0" required
                                                    value="{{ @session()->get('step1')['id_student'] }}"
                                                    name="id_student" placeholder="الرقم المدني" class="required">

                                            </div>
                                            

                                        </div>
                                    </div>

                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 classnew">
                                                <input type="text" required
                                                    value="{{ @session()->get('step1')['student_date'] }}"
                                                    class="dates required " id="date_student" name="student_date"
                                                    onMouseOver="(this.type='date')" id="date" name="full_name"
                                                    placeholder="تاريخ الميلاد">

                                            </div>
                                            <div class="col-md-6 col-sm-12 classnew">
                                                <input type="text" required
                                                    value="{{ @session()->get('step1')['student_date_place'] }}"
                                                    name="student_date_place" placeholder="مكان الميلاد"
                                                    class="required">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 classnew subcategory_id">
                                                <input type="text" hidden id="yeasrsss" disabled
                                                    value="{{ @session()->get('step1')['age_start'] }}"
                                                    placeholder="العمر">

                                                <input type="text" required id="yearss"
                                                    value="{{ @session()->get('step1')['age_start'] }}"
                                                    name="age_start" disabled placeholder="العمر">

                                            </div>
                                            <div class="col-md-6 col-sm-12 classnew">
                                                <input type="text" required
                                                    value="{{ @session()->get('step1')['nationality'] }}"
                                                    name="nationality" placeholder="الجنسية" class="required">


                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-inner-area">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-6 classnew">
                                                <input  type="text" required  value="{{ @session()->get('step1')['place_now'] }}"  name="place_now"  class="required" placeholder="مكان الإقامة" >

                                            </div>
                                            <div class="col-md-3 col-sm-6 classnew"> 
                                                <input type="text" required value="{{ @session()->get('step1')['governorate'] }}"  name="governorate" placeholder="المحافظة" class="required">

                                            </div>
                                            <div class="col-md-3 col-sm-6 classnew">
                                                <input  type="text"  required value="{{ @session()->get('step1')['state'] }}"  name="state"  class="required" placeholder="الولاية" >

                                            </div>
                                            <div class="col-md-3 col-sm-6 classnew">
                                                <input type="text" required  value="{{ @session()->get('step1')['village'] }}" name="village" placeholder="القرية" class="required">

                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-inner-area "  >
                                        <div class="row">
                                            <div class="col-md-6 classnew col-sm-12 ">
                                                <div class="language-select">
                        <select name="branch"   required id="test123" >
                            @php
                                $branches = App\Branch::where('status',1)->get();
                            @endphp
                                                            <!--->where('id','!=',9)-->
<!--where('id','!=',6)->-->
                        <option @if(session()->get('branch') == null) selected @endif value=""  disabled>يرجى اختيار فرع</option>
                        @foreach ($branches as $item)
                        
            
                        <option value="{{ $item->id }}" @if(session()->get('branch') == $item->id) selected @endif>{{ $item->title }}</option>
                        @endforeach
                        

                        

                        </select>

                                            </div>
                                           </div>
                                           <div class="col-md-6  col-sm-12 stagenone " >
                                            <div class="language-select" id="stage123"  >
                                                  @php
                                                @$branch = session()->get('branch');
                                                @$stage = session()->get('stage');
                                            @endphp
                                                @if($stage != null)
                                          
                                           
                                                @if($branch == 6 || $branch == 7 ||  $branch == 9 || $branch == 11 )
                                                <select name="stage"    required >
                                                    <option value="روضة" @if($stage == 'روضة') selected @endif>روضة</option>
                                                    <option value="تمهيدي" @if($stage == 'تمهيدي') selected @endif>تمهيدي</option>
                                                    <option value="تجهيزي" @if($stage == 'تجهيزي') selected @endif>تجهيزي</option>

                                                    
                                                      </select>
                                                @else
                                                <select name="stage"    required >
                                                
                                                
                        <option  disabled selected>يرجى اختيار المرحلة</option>
                                                    <option value="صف أول" @if($stage == 'صف أول') selected @endif>الصف الأول</option>
                                                    <option value="صف ثاني" @if($stage == 'صف ثاني') selected @endif>الصف الثاني</option>
                                                    <option value="صف ثالث" @if($stage == 'صف ثالث') selected @endif>الصف الثالث</option>
                                                    <option value="صف رابع" @if($stage == 'صف رابع') selected @endif>الصف الرابع</option>

                                                    </select>
                                                @endif
                                                @endif
                                              

                                            

                                        </div>
                                       </div>
                                        </div>
                                    </div>
                                    
                          
                                   
                                
                                    
                                    <div class="gender-selection">
                                        <div class="row">
                                            <div class="col-md-4 classnew " style="text-align: right;">
                                        <h3>جنس:</h3>
                                        <label>
                                            <input type="radio" checked="checked" name="gender" value="Male" @if(@session()->get('step1')['gender'] == 'Male') checked @endif  >
                                            <span class="checkmark"></span>ذكر
                                        </label>
                                        <label>
                                            <input type="radio" name="gender" value="Female" @if(@session()->get('step1')['gender'] == 'Female') checked @endif>
                                            <span class="checkmark"></span>أنثى
                                        </label>
                                              </div>
                                               <div class="col-md-8" style="text-align: right;">
                                                <h3>حالة النطق:</h3>
                                                <label>
                                                    <input type="radio" checked="checked" name="speking" value="طبيعي" >
                                                    <span class="checkmark"></span>طبيعي
                                                </label>
                                                <label>
                                                    <input type="radio" name="speking" value="يعاني من صعوبات">
                                                    <span class="checkmark"></span>يعاني من صعوبات
                                                </label>
                                                
                                               
                                                      </div>
                                    
                                    </div>
                                    </div>
                                    <div class="gender-selection" style="text-align: right;">
                                        
                                        <h3>الحالة الصحية : </h3>
                                        <label>
                                            <input type="radio" onclick="check1();" checked="checked" name="normal" value="1" >
                                            <span class="checkmark"></span>طبيعي
                                        </label>
                                        <label>
                                            <input type="radio" onclick="check1();" name="normal" value="2">
                                            <span class="checkmark"></span>يعاني من أمراض
                                        </label>
                                        <label>
                                            <input type="radio" onclick="check1();" name="normal" value="3">
                                            <span class="checkmark"></span>يعاني من حساسية
                                        </label>


                                    </div>
                                    <div class="form-inner-area" id="dess" style="display: none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="text" id="desr"   name="des_name" placeholder="ما هي"  >

                                            </div>
                                        </div>
                                    </div>

                                  
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /.inner -->
                        <div class="actions">
                            <ul>
                      
                                <li><button type="submit" class="btn btn-info">الخطوة التالية</button></li>
                            </ul>
                        </div>
                    </div>
                  
                </div>
            </form>
             
    </div>
    <script src="{{ asset('wizerd_form/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('wizerd_form/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('dist/cleave.min.js') }}"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 -->
<script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        function check1() {            
            var radio_check_val = "";
            for (i = 0; i < document.getElementsByName('normal').length; i++) {
                if (document.getElementsByName('normal')[i].checked) {
                 var $va =  document.getElementsByName('normal')[i].value  ;
                 if($va!=1){
           
                     document.getElementById("dess").style.display = "block";
                     $("input[name=des_name]").prop('required', true); 
                 }  else{
                    document.getElementById("dess").style.display = "none";
                    $("input[name=des_name]").prop('required', false); 

                 } 
                }        
            }
                 
        }
    </script>
 <script>

    $("#files").change(function() {
        filename = this.files[0].name
        console.log(filename);
    });

    function UploadFile() {
        var reader = new FileReader();
        var file = document.getElementById('attach').files[0];
        reader.onload = function() {
            document.getElementById('fileContent').value = reader.result;
            document.getElementById('filename').value = file.name;
            document.getElementById('wizard').submit();
        }
        reader.readAsDataURL(file);
    }
    </script>
    <script>
          $('#wizard').submit(function(evt) {
            $st = $('#student_id_number').attr('is_student');
            if ($st == 1) {
                evt.preventDefault();

            }
            var x = $('#yeasrsss').val();


            if (x < 3 || x >= 10) {


                Swal.fire({

                    title: 'العمر غير ملائم لعمر عباقرتنا يرجى التواصل عبر الواتساب (94230055)',
                    timer: 5000,
                    icon: "error",

                });
                evt.preventDefault();

            }


        });

        $('#student_id_number').change(function() {
            $.ajax({
                type: "post",
                dataType: "json",
                url: '{{ route('check_id_for_student') }}',
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': $('#student_id_number').val(),
                },
                success: function(data) {
                    $(student_id_number).attr('is_student', 0)
                    $('#student_id_number').css("border-color", "chartreuse");

                },
                error: function(data) {
                    $(student_id_number).attr('is_student', 1)
                    $('#student_id_number').css("border-color", "red");

                    Swal.fire({
                        icon: 'error',
                        title: 'لقد تم تسجيل الطالب من قبل',
                        text: 'يمكنك مشاهدة الطالب من خلال الذهاب الى لوحة تحكم ولي الأمر ',
                        footer: '<a target="_blank" href="{{ route('father.get_login') }}">انقر هنا للذهاب الى اللوحة</a>'
                    })

                }

            });
        });
    
    
    
    function mySubmitFunction()
            {
                

                
                
                
var x = document.getElementById("yeasrsss").value;
if( x < 3 || x >= 10 ){

                    swal({
                           title:'العمر غير ملائم لعمر عباقرتنا يرجى التواصل عبر الواتساب (94230055)',
                            timer: 5000,
                            icon:"error",
                            
                            showConfirmButton: false,
                            type: "success"
                        });
return false;
            }else{
                 return true;
            }
            }
        $(document).ready(function () {
    
  



          $(document).on('change','.dates',function(){
                var supp = $('.dates').val();
                
                document.getElementById("test123").style.display = "block";
                
                $.ajax({
                    url: '{{ route('date_count') }}',
                    type:'post',
                    dataType:'html',
                    data : { "_token": "{{csrf_token()}}",date :supp },
                    success: function (data){
                        
                        $('.subcategory_id').html(data);
                        // $.ajax({
                        //     url: '{{ route('pranch') }}',
                        //     type:'post',
                        //     dataType:'html',
                        //     data : { "_token": "{{csrf_token()}}",date :supp },
                        //     success: function (data){
                                
                        //         $('.branch').html(data);
                        //     // alert(data);
                         
                        //     }
                        // });           
                    }
               
         
                });
           
            });
           
            $("#test123").change(function(){
                var branch = $('#test123 option:selected').val();
                     $.ajax({
                        url: '{{ route('get_stage') }}',
                        type:'post',
                        dataType:'html',
                        data : { "_token": "{{csrf_token()}}",branch :branch},
                        success: function (data){
                            $('.stagenone').css("display", "block")
                            $( "#stage123" ).html( data );
                        }
});
        });
    });


          
            
    </script>
</body>


</html>