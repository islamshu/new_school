<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>طلب التحاق</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('form2/fonts/material-icon/css/material-design-iconic-font.min.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="{{ asset('form2/vendor/jquery/jquery.min.js') }}"></script>

 

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('form2/css/style.css') }}">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{asset('uploads/'.App\General::first()->course_image)}}" width="1200px" style="height:100%">
                </div>
                
                <div class="signup-form">
            
                    <form method="post" action="{{ route('job_apllication') }}" class="register-form" id="register-form">
                                        @method('POST')

                                @if(Session::has('success'))
    <div class="row mr-2 ml-2">
            <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2" style="background: #4fecf3"
                    id="type-error">{{Session::get('success')}}
            </button>
    </div>
@endif
                     @csrf
                        <h2>استمارة طلب توظيف
                        </h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الاسم بالكامل :</label>
                                <input type="text" name="name" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="tribe ">رقم البطاقة الشخصية :</label>
                                <input type="number" name="user_id" id="tribe " required/>
                            </div>
                            
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الجنسية :</label>
                                <input type="text" name="nationality" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="tribe ">تاريخ الميلاد:</label>
                                <input type="date" name="date" id="tribe " required/>
                            </div>
                            
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">الحالة الإجتماعية :</label>
                            <div class="form-radio-item">
                                <input type="radio" name="status" id="male" checked value="عزباء">
                                <label for="male">عزباء</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="status" id="female"  value="متزوجة">
                                <label for="female">متزوجة</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="status" id="dd"  value="آخرى">
                                <label for="dd">آخرى</label>
                                <span class=""></span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">رقم الهاتف وبه واتس اب :</label>
                                <input type="number" name="phone" id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="tribe ">مكان السكن:</label>
                                <input type="text" name="place" id="tribe " required/>
                            </div>
                            
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">الوظيفة الراغبة في تقديمها :</label>
                            <div class="form-radio-item"  style="margin-right:22px">
                                <input type="radio" name="job_app" id="malee" value="مديرة" checked>
                                <label for="malee">مديرة</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="job_app" id="femalee" value="معلمة">
                                <label for="femalee">معلمة</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="job_app" id="coordinated" value="منسقة">
                                <label for="coordinated ">منسقة</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="job_app" id="sub" value="مشرفة">
                                <label for="sub">مشرفة</label>
                                <span class=""></span>
                            </div>
                        </div>

                        <div class="form-radio">
                            <label  for="gender" class="radio-label">الفرع المراد التقديم اليه:</label>
                            <div class="form-radio-item" >
                                <input type="radio" name="branch" id="1" value="عبري" checked>
                                <label for="1" style="    padding-left: 0px;">عبري</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item" >
                                <input type="radio" name="branch" id="2" value="الهيال" >
                                <label for="2" style="    padding-left: 0px;">الهيال</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item" >
                                <input type="radio" name="branch" id="3" value="نزوى" >
                                <label for="3 " style="    padding-left: 0px;">نزوى</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item" >
                                <input type="radio" name="branch" id="4" value="الموالح" >
                                <label for="4" style="    padding-left: 0px;">الموالح</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item" >
                                <input type="radio" name="branch" id="5" value="المعبيلة" >
                                <label for="5">المعبيلة</label>
                                <span class=""></span>
                            </div>
                        
                           
                        </div>
                       
                        <div class="form-radio">
                            <label for="gender" class="radio-label">هل تملك رخصة قيادة ؟ </label>
                            <div class="form-radio-item"     style="margin-right:23px" >
                                <input type="radio" id="ddddw" name="driving" value="نعم" checked>
                                <label for="ddddw">نعم</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" name="driving" id="dddd" value="لا" >
                                <label for="dddd">لا</label>
                                <span class=""></span>
                            </div>
                          
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label"> هل تعاني من مرض مزمن وإعاقة :</label>
                            <div class="form-radio-item"  style="margin-right:22px" >
                                <input type="radio" id="asd" name="disease" value="نعم" checked>

                                <label for="asd">نعم</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" id="dddsw" name="disease" value="لا" >
                                <label for="dddsw">لا</label>
                                <span class=""></span>
                            </div>
                          
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label"> هل أخذتي دورات في رياض الأطفال :</label>
                            <div class="form-radio-item"style="margin-right:23px" >
                                <input type="radio" id="malwee" name="course" value="نعم" checked>
                                <label for="malwee">نعم</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" id="femqqale" name="course" value="لا" >
                                <label for="femqqale">لا</label>
                                <span class=""></span>
                            </div>
                          
                        </div>
                        <div class="form-radio">
                            <label for="gender" class="radio-label">هل سبق لك العمل في مؤسسة او مدرسة:</label>
                            <div class="form-radio-item">
                                <input type="radio" id="work" name="working" value="نعم" checked>
                                <label for="work">نعم</label>
                                <span class=""></span>
                            </div>
                            <div class="form-radio-item">
                                <input type="radio" id="woaark" name="working" value="لا" >
                                <label for="woaark">لا</label>
                                <span class=""></span>
                            </div>
                          
                        </div>
                     
                        <div class="form-group">
                            <label for="name">ما هي مؤهلاتك العلمية ؟ مع ذكر المؤهل- التخصص-مكان التخرج /المعدل</label>
                            <textarea class="form-control" name="qualifications" id="ckeditor"rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">ماهي خبراتك العملية السابقة؟ مع ذكر العمل ومكان العمل وتاريخ الإلتحاق بالعمل - تاريخ ترك العمل مع الأسباب</label>
                            <textarea class="form-control" name="experience"  id="ckeditor"rows="3" required></textarea>
                        </div>

                        




                       
                          

                        <div class="form-submit">
                            <button class="submit" id="submit" >تسجيل </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <div class="modal" tabindex="-1" id="modal1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>تم التسجيل بنجاح</p>
      </div>
      <div class="modal-footer">
 
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- JS -->
    <script src="{{ asset('form2/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

    <script>
        $(document).on('change','.cour',function(){
            var co_id = $('.cour option:selected').val();
      
            $.ajax({
                url: '{{ route('course') }}',
                type:'get',
                dataType:'html',
                data : { "_token": "{{csrf_token()}}",co_id :co_id},
                success: function (data){
                    
                    $('.dddd').html(data);
                }
               
         
            });  


            $('#submit').click(function(){
            
       
         
       
                var name = $("select[name=name]").val();
                alert(name);
                var user_id = $("input[name =user_id]").val();
                alert(user_id);
                var nationality = $("input[name=nationality]").val();
                alert(nationality);
                var date = $("input[name=date]").val();
                alert(date);
                var status = $("input[name=status]").val();
                alert(status);
                var phone = $("input[name=phone]").val();
                alert(phone);
                var place = $("input[name=place]").val();
                alert(place);
                var job_app = $("input[name=job_app]").val();
                alert(job_app);
                var branch = $("input[name=branch]").val();
                alert(branch);
                var driving = $("input[name=driving]").val();
                alert(driving);
                var disease = $("input[name=disease]").val();
                alert(disease);
                var course = $("input[name=course]").val();
                alert(course);
                var working = $("input[name=working]").val();
                alert(working);
                var qualifications = $("textarea[name=qualifications]").val();
                alert(qualifications);
                var experience = $("textarea[name=experience]").val();
                alert(experience);
              

                
                
    
                  });
            

            

            
        });
    </script>
  
     <script>
                        CKEDITOR.replace( '#ckeditor' );
    </script>
   
</body>
</html>