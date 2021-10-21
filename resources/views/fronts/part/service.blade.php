<!--<section class="section-padding section-2-bg" id="services">-->
<!--    <div class="container">-->
<!--        <div class="heading-div-1 text-center">-->
        
<!--                         <h2 style="margin-bottom:30px" > <span class="highlight">&nbsp;&nbsp;&nbsp; {{App\General::first()->secand_sec_title}}&nbsp;&nbsp;&nbsp;</span></h2>-->

<!--        </div>-->
            
       
<!--        <div class="row">-->
<!--            @foreach (App\Service::where('status',1)->take(6)->get() as $item)-->
               
<!--            <div class="col-sm-6 col-md-3 services-col section-space">-->
<!--           <img src="{{ asset('uploads/'.$item->image) }}"style="    margin-right: 68%;" width="80px" height="70px" alt="">-->
<!--                <div class="services-div services-bg" style="  box-shadow: 10px 10px;">-->
                   
<!--                    <h4 style="font-size:18px !important;text-align:center;color:#349191;    margin-bottom: 15px;">{{ $item->title }}</h4>-->
<!--                    <span style="text-align:center;">-->
<!--{!! $item->description !!}-->
<!--</span>-->
<!--           <div class="content-top-space">-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            @endforeach-->
         
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<div class="cards" id="services">
    <div class="container">
 <h2 style="margin-bottom:30px; text-align:center" > <span class="highlight">&nbsp;&nbsp;&nbsp; {{App\General::first()->secand_sec_title}}&nbsp;&nbsp;&nbsp;</span></h2>
        <div class="row">

                        @foreach (App\Service::where('status',1)->take(6)->get() as $item)
            <div class="card col-xs-12 col-sm-6 col-md-3 hvr-bob">
                <div class="card-inner">
                    <img src="{{ asset('uploads/'.$item->image) }}" alt="">
                    <h2>{{ $item->title }}</h2>
                 <p> {!! $item->description !!} </p>
                </div>
             </div>
                @endforeach
             

    
        
    
         
        </div>
    </div>
</div>