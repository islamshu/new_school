<section class="feat section-padding" style="position:relative" >
    <div class="container">
        @php
            $about = App\About_2::first();
        @endphp
        <div class="row">
            <div class="col-sm-6 section-space single-column-img" style="z-index:2">
                <img src="{{ asset('uploads/'.$about->image) }}" width="750" height="600" alt="750x600" class="img-responsivee"/>				
            </div>
            <div class="col-sm-6 report single-column-res" style="margin-top:0%;z-index:2" >
            
                                             <h3 style="color:black;margin-bottom: 10%" > <span class="highlight11" style="color:white">&nbsp;&nbsp;&nbsp; {{ $about->title }}&nbsp;&nbsp;&nbsp;</span></h3>

              


              
                <span style="font-size:18px">
                {!! $about->description !!}
                </span>
                <div class="report-points">
                    <div class="row">
                        <div class="col-sm-6" >
                            <ul class="report-ul"> 
                               {!! $about->list1 !!} 
                            </ul>
                        </div>
                        <div class="col-sm-6" >
                            <ul class="report-ul report-ul-1">
                                {!! $about->list2 !!} 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="overlay-2"></div>
</section>