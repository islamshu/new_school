<!doctype html>
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@php
			$config = App\Config::first();
		@endphp
		<title>{{ $config->title }}</title>
		<!-- FAVICON LINK -->
		<link rel="shortcut icon" href="{{ asset('uploads/'.$config->icon) }}" type="image/x-icon">
		<!-- STYLESHEETS -->
		<!-- BOOTSTRAP CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/vendor/bootstrap.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/bootstrap-theme.min.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/bootstrap-rtl.min.css')}}">
		<!-- FONT AWESOME -->
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/font-awesome/css/font-awesome.min.css')}}" />
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/font-awesome/dist/font-awesome-animation.min.css')}}" />
		<!-- MAGNIFIC LIGHT BOX -->
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/magnific/magnific-popup.css')}}">
		<!-- CAROUSEL STYLE LINK -->
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/owl-carousel/owl.carousel.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/owl-carousel/owl.theme.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/vendor/owl-carousel/carousel.css')}}">
		<!-- CUSTOM CSS -->

				<link rel="stylesheet" type="text/css" href="{{asset('front/css/custom/inline.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/custom/style.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('front/css/custom/rtl.css')}}">
		<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
    <link href="{{asset('card_style/libs/fontawesome-pro-5.14.0-web/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('card_style/libs/Hover-master/Hover-master/css/hover.css')}}" rel="stylesheet">
    <link href="{{asset('card_style/libs/normalize.css" rel="stylesheet')}}">
    <link href="{{asset('card_style/libs/WOW-master/css/libs/animate.css')}}" rel="stylesheet">
    <link href="{{asset('card_style/css/style.css')}}" rel="stylesheet">
		
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


	</head>
	<body data-spy="scroll" data-target=".navbar-fixed-top" data-offset="100" >

        <!--================================= NAVIGATION START ==========================================-->
		<header>
			<nav class="topbar navbar navbar-default navbar-fixed-top clearfix" id="">
				<div class="container">
					<div class="logo-image">
						<a href="#"><img src="{{ asset('uploads/'.$config->logo) }}" width="200px" height="100px" alt="150x50" /></a>
					</div>
					@php
					$general = App\General::first();
					@endphp
					<div class="navbar-right nav" style="margin-top:2%">
						<div class="navbar-header">
							<button data-toggle="collapse-side" data-target=".side-collapse" data-target-2=".side-collapse-container" type="button" class="navbar-toggle pull-left"><span class="icon-bar gray"></span><span class="icon-bar gray"></span><span class="icon-bar"></span></button>					
						</div>
						<div class="navbar-inverse side-collapse in">
							<div class="collapse navbar-collapse" >
							
								<ul class="content-ul side-menu-icon">
                    @if($general->first_socail != null)
                    <li><a href="{{$general->first_socail}}" class="fa fa-facebook"></a></li>
                    @endif
                    @if($general->secand_socail != null)
                    <li><a href="{{$general->secand_socail}}" class="fa fa-twitter"></a></li>
                    @endif
                     @if($general->third_socail != null)
                  <li><a href="{{$general->third_socail}}" class="fa fa-instagram"></a></li>
                    @endif
                     @if($general->fourth_socail != null)
                    <li><a href="https://api.whatsapp.com/send?phone={{$general->fourth_socail}}" class="fa fa-whatsapp"></a>
                    @endif
                    
                    
                </ul>
								<ul class="nav navbar-nav" id="menu_1" >
									<li class="menu">
									
								
									    <a href="#home" class="pagescroll">
									   {{$general->first_menu}}
										</a>
								
									</li>
									<!--<li class="menu">-->
									<!--	<a href="#about" class="pagescroll">-->
									<!--	{{$general->secand_menu}}-->
									<!--	</a>-->
									<!--</li>-->
									
									<!--<li class="menu">-->
									<!--	<a href="#services" class="pagescroll">-->
									
									<!-- {{$general->third_menu}}    -->
									<!--	</a>-->
									<!--</li>-->
									
										<li class="menu">
										<a href="https://abqary-academy.com/" >
									
									 {{$general->seven_menu}}    
										</a>	
									
									</li>
										@if($general->is_show_course != 0 )
											<li class="menu">
										<a href="/register_co" >
									
									 {{$general->eight_menu}}    
										</a>	
									
									</li>
								@endif
									@if($general->student_form != 0 )

									<li class="menu">
										<a href="/register-student" >
									  {{$general->fourth_menu}}  
										</a>
									</li>
										@endif
																		@if($general->job_form != 0 )

									<li class="menu">
										<a href="/job" >
									  {{$general->five_menu}}  
										</a>
									</li>
										@endif
										<li class="menu">
										<a href="/father-login">
									  {{'تسجيل الدخول'}}  
										</a>
									</li>
									<!--<li class="menu">-->
									<!--	<a href="#contact" class="pagescroll">-->
									<!--  {{$general->six_menu}}  -->
									<!--	</a>-->
									<!--</li>-->
								</ul>
							</div>
						</div>
					</div>
					<!-- /.navbar-collapse -->
				</div>
			</nav>
		</header>
        @yield('content')
<div class="modal" tabindex="-1" id="modal1" role="dialog" style="margin-top:100px">
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



<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script type="text/javascript" src="{{asset('front/js/vendor/bootstrap.min.js')}}"></script>		
		<!-- SLIDER JS FILES  -->
		<script type="text/javascript" src="{{asset('front/js/vendor/slider/owl.carousel.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/slider/owl-slider.js')}}"></script>	
		<!-- COUNTER JS FILES -->
		<script type="text/javascript" src="{{asset('front/js/vendor/counter/counter-lib.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/counter/jquery.counterup.min.js')}}"></script>		
		<!-- MAGNIFIC LIGHT BOX -->
		<script type="text/javascript" src="{{asset('front/js/vendor/magnific/jquery.magnific-popup.js')}}"></script>
		<!-- SUBSCRIBE MAILCHIMP -->
		<script type="text/javascript" src="{{asset('front/js/vendor/subscribe/subscribe_validate.js')}}"></script>			
		<!-- FORM VALIDATION -->
		<script type="text/javascript" src="{{asset('front/js/vendor/validate/jquery.validate.min.js')}}"></script>
		<!-- PARALLAX -->
		<script type="text/javascript" src="{{asset('front/js/vendor/parallax/parallax.min.js')}}"></script>
		<!-- YOU TUBE VIDEO BG -->
		<script type="text/javascript" src="{{asset('front/js/vendor/video/video.js')}}"></script>		
		<!-- FLIP -->
		<script src="{{asset('front/js/vendor/flip/jquery.flip.min.js')}}"></script>		
		<!-- PIE CHART -->
		<script src="{{asset('front/js/vendor/pie-chart/chart.js')}}"></script>
		<script src="{{asset('front/js/vendor/pie-chart/pie-chart.js')}}"></script>		
		 <!-- SHUFFLE JS FILES -->
		<script type="text/javascript" src="{{asset('front/js/vendor/shuffle/modernizr.custom.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/shuffle/jquery.shuffle.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/shuffle/page.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/shuffle/evenheights.js')}}"></script>
		<script type="text/javascript" src="{{asset('front/js/vendor/shuffle/homepage.js')}}"></script>
		<!-- THEME JS -->
		<script type="text/javascript" src="{{asset('front/js/custom/custom.js')}}"></script>
		@if(session()->get('modalll') != null || session()->get('modalll22') || session()->get('have_verfy') == 1  )
<script>
$(function() {
    $('#modal1').modal('show');
    

});
</script>
  @php
            Session::flush();
 @endphp

@endif

		 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	
  <script>
    //Allows bootstrap carousels to display 3 items per page rather than just one
    $('.carousel.carousel-multi .item').each(function () {
      var next = $(this).next();
      if (!next.length) {
        next = $(this).siblings(':first');
      }
      next.children(':first-child').clone().attr("aria-hidden", "true").appendTo($(this));

      if (next.next().length > 0) {
        next.next().children(':first-child').clone().attr("aria-hidden", "true").appendTo($(this));
      }
      else {
        $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
      }
    });
  </script>
	</body>

</html>
