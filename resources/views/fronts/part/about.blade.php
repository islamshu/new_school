<section class="about section-padding" id="about">
    <div class="container">
        @php
            $about = App\About::first();
        @endphp
        <div class="row">
            <div class="col-sm-6 single-column-img working margin-top">
                <!--margin-right:-6%-->
                <img src="{{ asset('uploads/'.$about->image) }}" width="750" height="750" alt="750x720" class="img-responsive " />	
            </div>
            <div class="col-sm-6 business2-col single-column-res">
             <h3 style="margin-bottom: 20px;" > <span class="highlight">&nbsp;&nbsp;&nbsp; {{ $about->main_title }}&nbsp;&nbsp;&nbsp;</span></h3>
               <span style="font-size:19px ; margin:0px">{!! $about->main_des !!}</span> 
                <div class="faq-div faq-row">
                    <ul class="faq-ul">
                        <li class="faq-li">
                            <div class="faq-title">
                                <div class="faq-icon">
                                    <span class="icon-1"></span>
                                </div>
                                <h4 class="underline" > {{ $about->title_1 }}</h4>
                            </div>
                            <div class="faq-ans">
                                <div class="faq-content">
                                  {!! $about->des_1 !!}
                                </div>
                            </div>
                        </li>
                        <li class="faq-li">
                            <div class="faq-title">
                                <div class="faq-icon">
                                    <span class="icon-2"></span>
                                </div>
                                <h4  class="underline" > {{ $about->title_2 }}</h4>
                            </div>
                            <div class="faq-ans">
                                <div class="faq-content">
                                    {!! $about->des_2 !!}
                                </div>
                            </div>
                        </li>
                        <li class="faq-li">
                            <div class="faq-title">
                                <div class="faq-icon">
                                    <span class="icon-3"></span>
                                </div>
                                <h4  class="underline" >{{ $about->title_3 }}</h4>
                            </div>
                            <div class="faq-ans">
                                <div class="faq-content">
                                    {!! $about->des_3 !!}
                                </div>
                            </div>
                        </li>
                        <li class="faq-li">
                            <div class="faq-title">
                                <div class="faq-icon">
                                    <span class="icon-4"></span>
                                </div>
                                <h4  class="underline" >{{ $about->title_4 }}</h4>
                            </div>
                            <div class="faq-ans">
                                <div class="faq-content">
                                    {!! $about->des_4 !!}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>