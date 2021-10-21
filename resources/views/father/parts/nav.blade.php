<div class="panel" >

    <ul class="nav " style="direction: rtl;">
                
        <li class="nav-item">
        <img src="{{asset('father_style/images/student1.png')}}" class="rounded-circle" style="width: 45px; height: 45px;">
    </li>
        <li class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">خيارات</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{route('change_pass.father_get')}}">اعادة تعيين كلمة المرور <i class="far fa-power-off"></i></a>
                <a class="dropdown-item" href="{{route('father_logout')}}">تسجيل الخروج <i class="far fa-sign-out"></i></a>
        
        </li>
          <li class="nav-item dropdown">
                @php 
                  $count= App\Notification::where('notifiable_id',Auth::id())->where('notifiable_type','App\Father')->where('read_at',null)->count() ;
                  @endphp
         
                        <a class="nav-link dropdown-toggle-2" data-toggle="dropdown" id="read_not"  href="#" role="button" aria-haspopup="true" aria-expanded="false"><p class="notifications"><i class="fas fa-bell"></i><sup>{{$count}}</sup></p></a>
                        <div class="dropdown-menu notifiuser ">
                            </div>
                         
                    
                    </li>

      @if(request()->routeIs('all_bills'))
               
       
        
        
        <form class="form-inline ml-auto"  style="direction: rtl;" >
            <input class="form-control mr-sm-2" type="search"name="data"  value="{{request()->data}}" placeholder="بحث" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0 mr-1" type="submit">بحث</button>
        </form>
           
            @endif

        <div id="toggle" class="toggle"></div>

    

</ul>