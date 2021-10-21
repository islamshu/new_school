   @php
                    $general = \App\General::first();

            @endphp
<!--================================= SUBSCRIBE ENDS ==========================================-->

<!--================================= FOOTER-2 START ==========================================-->		
<div class="section-padding footer-bg bgimage-property footer-font" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 footer-col-1 res-section-space res-section-space-1" style="    color: white;
">
                {!! $general->description !!}
                <ul class="content-ul social-icon-1">
                    @if($general->first_socail != null)
                    <li><a href="{{$general->first_socail}}" class="fab fa-facebook"></a></li>
                    @endif
                    @if($general->secand_socail != null)
                    <li><a href="{{$general->secand_socail}}" class="fab fa-twitter"></a></li>
                    @endif
                     @if($general->third_socail != null)
                  <li><a href="{{$general->third_socail}}" class="fab fa-instagram"></a></li>
                    @endif
                     @if($general->fourth_socail != null)
                    <li><a href="https://api.whatsapp.com/send?phone={{$general->fourth_socail}}" class="fab fa-whatsapp"></a>
                    @endif
                    
                    
                </ul>
            </div>
            <div class="col-sm-6 col-md-4 res-section-space clearfix res-section-space-1">
                <ul class="links">
                		<li style="color:white" >
										<a href="#about" >
										{{$general->secand_menu}}
										</a>
									</li>
                	<li >
										<a href="#home" >
									   {{$general->first_menu}}
										</a>
									</li>
									@if($general->student_form != 0 )
									<li>
										<a href="/register-student">
									  {{$general->fourth_menu}}  
										</a>
									</li>
									@endif
								
									
									<li >
										<a href="#services" >
									
									 {{$general->third_menu}}    
										</a>
									</li>
									<li >
										<a href="https://abqary-academy.com/" >
									
									 {{$general->seven_menu}}    
										</a>
									</li>
									@if($general->is_show_course != 0 )
											<li >
										<a href="/register_co" >
									
									 {{$general->eight_menu}}    
										</a>	
									
									</li>
								@endif
										<li >
										<a href="#contact" >
									  {{$general->six_menu}}  
										</a>
									</li>
									@if($general->job_form != 0 )
									<li >
										<a href="/job" >
									  {{$general->five_menu}}  
										</a>
									</li>
									@endif
								
                </ul>
            </div>
           
            <div class="col-sm-6 col-md-4 res-section-space">
                <ul class="content-ul footer2-address" style="color: white" >
                    <li>
                        <p class="address"><i class="fas fa-map-marker-alt" style=" margin-left: 5px;"></i>{{App\Config::first()->address}}</p>
                    </li>
                </ul>
                <ul class="content-ul footer2-address"  style="color: white">
                    <li>
                        <p class="mail"> <i class="fas fa-envelope" style=" margin-left: 5px;"></i> <a href="mailto:{{App\Config::first()->email}}" class="text-white">{{App\Config::first()->email}}</a></p>
                    </li>
                </ul>
                <ul class="content-ul footer2-address"  style="color: white">
                    <li>
                       <a href="tel:{{App\Config::first()->phone}}">
                        <p class="phone"> {{App\Config::first()->phone}}<i class="fas fa-phone" style=" margin-left: 5px;"></i> </p>
                        </a>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<footer class="copyright-2-bg">
    <div class="container copyright text-center">
        <p> {{ $general->develop_by}} </p>
    </div>
</footer>
