<section class="books section-padding section-1-bg">
    <div class="container">
        <div class="heading-div-1 text-center">
            @php
          $general = App\General::first();

            @endphp
         
                                     <h2 style="margin-bottom:30px" > <span class="highlight">&nbsp;&nbsp;&nbsp; {{App\General::first()->third_sec_title}}&nbsp;&nbsp;&nbsp;</span></h2>

            
        </div>
        <div class="row">
            @foreach (App\Study::where('status',1)->take(6)->get() as $item)
                
             <div class="col-xs-12 col-sm-6 col-md-4 three-col" >
                <div class="flip" style="height: 350px !important;">
                    <div class="front"> 
                        <img style="height: 350px" src="{{ asset('uploads/'. $item->image ) }}" height="350px" alt="370x250x1" class="img-responsive image-bottom-space flip-img"/>
                    </div>
                    <div class="back">
                        <h4>{{ $item->title }}</h4>
                            {!! $item->description !!}
                        <div class="content-top-space">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>