<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>طلب التحاق</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('form2/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

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
                    
                    <form  class="register-form" id="register-form" action="{{ route('register_co.store') }}" method="post">
                     @csrf
                     @if(Session::has('success'))
                     <div class="row mr-2 ml-2">
                             <button type="text" class="btn btn-lg btn-block btn-outline-success mb-2" style="background: #4fecf3;height: 50px;
                             background: #4fecf3;
                             width: 100%;
                             border-radius: 1%;
                             font-size: 18px;"
                                     id="type-error">{{Session::get('success')}}
                             </button>
                     </div>
                 @endif
                 
                   @if(Session::has('error'))
                     <div class="row mr-2 ml-2">
                             <button type="text" class="btn btn-lg btn-block btn-outline-danger mb-2" style="background :#eb3b3b !important;height: 50px;
                             background: #4fecf3;
                             width: 100%;
                             border-radius: 1%;
                             font-size: 18px;"
                                     id="type-error">{{Session::get('error')}}
                             </button>
                     </div>
                 @endif
                        <h2>  معهد عبقري المهارات للتدريب المهني
 
                        </h2>
                            <div class="form-group">
                                <label for="state">اسم الدورة :</label>
                                <div class="form-select">
                                    <select name="course_id" required class="cour"  id="state">
                                    <option value="" selected disabled>يرجى اختيار الدورة</option>

                                        @foreach ($course as $item)
                                        <option value="{{ $item->id }}" >{{ $item->title }}</option>

                                        @endforeach
                                       
                                    </select>
                                    <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                                </div>
                            </div>
                            
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">الاسم الثلاثي :</label>
                                <input type="text" name="name" required id="name" required/>
                            </div>
                            <div class="form-group">
                                <label for="tribe ">القبيلة :</label>
                                <input type="text" name="tribe" id="tribe " required/>
                            </div>
                            
                        </div>
                           <div class="form-row">
                            <div class="form-group">
                                <label for="st_id">رقم البطاقة الشخصية :</label>
                                <input type="number" name="st_id" id="st_id" required/>
                            </div>
                             <div class="form-group">
                            <label for="phone">رقم الهاتف :</label>
                            <input type="number" name="phone" id="phone" required/>
                        </div>
                          
                        </div>
                             <div class="form-row">
                            <div class="form-group">
                                <label for="email">البريد الإلكتروني  :</label>
                                <input type="email" name="email" required id="email" required/>
                            </div>
                              <div class="form-group">
                                <label for="learn">المؤهل الدراسي :</label>
                                <input type="text" name="learn" id="learn" required/>
                            </div>
                           
                           
                            
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="governorate">المحافظة :</label>
                                <input type="text" name="governorate" id="governorate" required/>
                            </div>
                            <div class="form-group">
                                <label for="state">الولاية :</label>
                                <input type="text" name="state" id="state" required/>
                            </div>
                            
                        
                        </div>
                        <div class="form-group">
			                            <label for="job">الوظيفة ومكان العمل :</label>
                            <input type="text" name="job" id="job" required/>

                        </div>
                     
                        
                      
                           <span class="dddd" >

                           </span>
                          
                           <div class="custom-control custom-checkbox">
                            <input required type="checkbox" checked class="form-control ch-box ischecked" style="display: inline-block;width:5%" id="customCheck1">
                            <label class="custom-control-label" style="display: inline" for="customCheck1">أتعهد بالالتزام بجميع اشتراطات التدريب بالمعهد
   
                            </label>
                          </div>
                       
                     

                        <div class="form-submit">
                          <input type="submit" value="تسجيل" class="btn-submit"  id="" style="    background-color: #ffe6b9;
                          width: 50%;
                          font-size: 18px;">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('form2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('form2/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        
            $(document).ready(function(){

//                 $('.ch-box').click(function(){
//                     // $('.btn-submit').attr('id','submit');
//                     // $('.btn-submit').removeAttr('disabled');
//     var checkBox = document.getElementById("customCheck1");
//   var text = document.getElementsByClassName("btn-submit");
//   if (checkBox.checked == true){
//     $('.btn-submit').attr("disabled", false);	
//   } else {
//     $('.btn-submit').removeAttr("disabled");
//   }
                   
//                 })
$('#customCheck1').click(function () {
        //check if checkbox is checked
        if ($(this).is(':checked')) {

            $('.btn-submit').removeAttr('disabled'); //enable input

        } else {
            $('.btn-submit').attr('disabled', true); //disable input
        }
    });
                

                

            $( ".cour" ).change(function() {

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
            
                    if($('.signup-form input').val()== ""){
                            return false
                    }
                    else{


       
                        var course_id = $("select[name=course_id]").val();
                var name = $("input[name =name]").val();
                 
                var tribe = $("input[name=tribe]").val();
                var governorate = $("input[name=governorate]").val();
     
                var state = $("input[name=state]").val();
                var phone = $("input[name=phone]").val();
                var job = $("input[name=job]").val();
                var st_id = $("input[name=st_id]").val();
                var learn = $("input[name=learn]").val();
                $.ajax({
                    type: "post",
                    dataType: "json",
                    url: '{{ route('register_co.store') }}',
                    data: { "_token": "{{csrf_token()}}",'course_id':course_id,'name':name,'tribe':tribe,'governorate':governorate,'state':state,'phone':phone,'job':job,'st_id':st_id,'learn':learn },
                    
                 
                   
                    success: function (data){
                        swal({
                            title:'تم الإرسال بنجاح',
                            text: data.status,
                            timer: 5000,
                            icon:"success",
                            showConfirmButton: false,
                            type: "success"
                        }),
                        document.getElementById("register-form").reset();

                    },
                    error: function (data){
                        swal({
                            title:'خطأ في الارسال',
                            text: data.status,
                            timer: 5000,
                            icon:"error",
                            showConfirmButton: false,
                       
                        })
                    }
                    
         
              });

                
            }
    
                  });
            

            

            
        });
    });
    </script>
</body>
</html>