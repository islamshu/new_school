<section class="testimonial section-padding section-1-bg" id="testimonial">
    <div class="container">
        <div class="heading-div-1 text-center">
            <!--<h2>هادة</h2>-->
                         <h3 > <span class="highlight">&nbsp;&nbsp;&nbsp; آراء أولياء الأمور&nbsp;&nbsp;&nbsp;</span></h3>

        </div>
        <div id="owl-demo1"  class="owl-carousel">
            @foreach (\App\Review::where('status',1)->get() as $item)
                
          
            <div class="item">
                <div class="testimonial-col">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <img src="{{ asset('uploads/'.$item->image) }}" width="100px" height="100px" alt="120x120x1"/>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-8">
                            <span style="color:black">{!! $item->description !!}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>
    </div>
</section>
<!--<section class="section-padding section-1-bg" id="testimonial">-->
  
<!--        <div class="heading-div-1 text-center">-->
            <!--<h2>هادة</h2>-->
<!--                         <h3 > <span class="highlight">&nbsp;&nbsp;&nbsp; الفعاليات والأنشطة التعليمية  &nbsp;&nbsp;&nbsp;</span></h3>-->

<!--        </div>-->
<!--  <div id="carousel-example-multi" class="carousel carousel-multi slide">-->
    <!-- Indicators -->
<!--    <ol class="carousel-indicators">-->
<!--      @foreach (App\Gallery::get() as $key=>$item)-->

<!--      <li data-target="#carousel-example-multi" data-slide-to="{{ $key }}" class="@if($key == 0) active @endif"></li>-->
<!--      @endforeach-->

<!--    </ol>-->

<!--    <div class="carousel-inner" role="listbox">-->
<!--        @foreach (App\Gallery::get() as $key=>$item)-->
            
      
<!--      <div class="item padd {{ $key == 0 ? 'active' : '' }}" style="width:100%">-->
<!--        <div class="media media-card">-->

<!--          <h4 class="media-heading">-->
<!--<img class="imag123" src="{{ asset('uploads/'.$item->image )}}" style="    border-radius: 20%;">-->
       
<!--      </div>-->
<!--      </div>-->
<!--      @endforeach-->

   

     

<!--    </div>-->

    <!-- Controls -->
<!--    <a class="left carousel-control" href="#carousel-example-multi" role="button" data-slide="prev">-->
<!--      <span class="glyphicon glyphicon-chevron-left" style="    margin-left: -12px !important;-->
<!--" aria-hidden="true"></span>-->
<!--      <span class="sr-only">السابق</span>-->
<!--    </a>-->
<!--    <a class="right carousel-control" href="#carousel-example-multi" role="button" data-slide="next">-->
<!--      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>-->
<!--      <span class="sr-only">التالي</span>-->
<!--    </a>-->
<!--  </div>-->
<!--  </section>-->
<div class="gallry">
    <div class="container">
                         <h3 style="text-align:center; margin-bottom:40px" > <span class="highlight">&nbsp;&nbsp;&nbsp; الفعاليات والأنشطة التعليمية  &nbsp;&nbsp;&nbsp;</span></h3>
        <div class="row">
            @foreach (App\Gallery::get() as $key=>$item)

            <div class="item col-lg-4 hvr-forward">
                <img src="{{ asset('uploads/'.$item->image )}}">
                <div class="overlay">
                    <h3 class="text-center">{{$item->caption}} </h3>
                    <!--<img src="{{asset('card_style/images/pencil-and-ruler (1).png')}}">-->
                </div>
            </div>
            @endforeach

          
        </div>
    </div>
</div>
    