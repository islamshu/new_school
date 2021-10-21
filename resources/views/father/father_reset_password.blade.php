<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
@php
			$config = App\Config::first();
		@endphp
		<title>{{ $config->title }}</title>
    <link rel="stylesheet" href="libs/fontawesome-pro-5.14.0-web/css/all.min.css">
    <link rel="stylesheet" href="libs/Hover-master/Hover-master/css/hover-min.css">
    <link rel="stylesheet" href="libs/normalize.css">
    <link rel="stylesheet" href="libs/WOW-master/css/libs/animate.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-light">

    <div id="main-wrapper" class="login-register h-100 d-flex flex-column bg-transparent text-right" style="direction: rtl; ">
        <div class="container my-auto">
          <div class="row no-gutters h-100">
            <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
              <div class="logo text-center mb-2"> <a href="index.html" title="">
                <img src="{{asset('father_style/images/login.png')}}" style="width: 70%;height: 100%;" alt="">
              </a> </div>
            <p class="lead text-center mb-3">ادخل بريدك الالكتروني</p>
                     @include('father.parts.success')
@include('father.parts.errorr')
              <form id="loginForm" method="post" action={{route('father.reset_password')}}>
                  @csrf
                <div class="vertical-input-group">
                  <div class="input-group">
                    <input type="email" name="email" class="form-control mb-1" id="emailAddress" required placeholder="البريد الالكتروني" style="height: 45px;">
                  </div>
                </div>
                <button class="btn btn-primary btn-block shadow-none my-4" type="submit" style="height: 45px;">تسجيل الدخول</button>
              </form>
            </div>
          </div>
        </div>
     
      </div>
      



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="libs/fontawesome-pro-5.14.0-web/js/all.min.js"></script>
<script src="libs/WOW-master/dist/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>