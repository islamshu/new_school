    @php
        $d = \App\Slider::where('status',1)->take(3)->get() ;
        $general = \App\General::first();
    @endphp
    
        
    <div class="slider-main" id="home">
        <div id="owl-example" class="owl-carousel slider123" >
           
         @foreach (\App\Slider::where('status',1)->take(3)->get() as $item)
             
            <div class="owl-slide">
                <div class="slider123 slider-image3 bgimage-property slider1-padding slid" style=" background-image: url({{ asset('uploads/'.$item->image) }})" >
                    <div class="container">
                        <div class="col-md-push-4 col-md-12 col-sm-12 col-xs-12 header-div-1">
                            <h1>{{ $item->title }}</h1>
                            {!! $item->description !!}
                            @if ($item->text_link != null)
                            <a href="{{ $item->link }}" style="margin-bottom:7%" class="btn btn-3">{{ $item->text_link }}</a>
                            @else
                               <a  style="margin-bottom:7%" >{{ $item->text_link }}</a>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="custom-control">
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <button data-slide="0" class="active slide-0"></button>
                </div>
                <div class="col-xs-4 col-md-4">
                    <button data-slide="1" class="slide-1"></button>
                </div>
                <div class="col-xs-4 col-md-4">
                    <button data-slide="2" class="slide-2"></button>
                </div>
            </div>
        </div>
    </div> 







<section class="theme-bg strip-padding ">
    <div class="container">
        <div class="row strip-row">
            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-10 strip-col onecolumn-res text-left">
                <h3>{{ @$general->first_sec_title }}</h3>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 strip-col-1 ">
                <a href="{{  @$general->first_sec_link }}" class="btn btn-2">{{  @$general->first_sec_link_title  }}</a>
            </div>
        </div>
    </div>
</section>