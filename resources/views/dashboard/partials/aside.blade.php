<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light navbar-full sidenav-active-rounded">
    <div class="brand-sidebar">
        
      <h1 class="logo-wrapper"><a class="brand-logo darken-1" href="{{route('admin.dashboard')}}"><span style="font-size: 16px;" class="logo-text hide-on-med-and-down">{{App\Config::first()->title}}</span></a><a class="navbar-toggler" href="#"><i class="material-icons">radio_button_checked</i></a></h1>
    </div>
   
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
                                    @if(auth()->user()->HasRole('اداري') || auth()->user()->HasRole('مدير مدرسة'))

      
      <li class=" bold"><a class="collapsible-header waves-effect waves-cyan " href="{{ route('admin.dashboard') }}"><i class="material-icons">home</i><span class="menu-title" data-i18n="Dashboard">الرئيسية</a>
    
      </li>
      @endif
     
@if(Auth::user()->HasRole('اداري'))
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Templates">إعدادات الموقع</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('general.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">العناوين الرئيسية</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('config.edit') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">إعدادات النظام</span></a></li>
            
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('slider.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">السلايدرات</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('about.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">من نحن</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('service.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">برامجنا الدراسية</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('study.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">مناهجنا التعليمية</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('about2.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">ميزات</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('review.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">آراء أولياء الامور</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('gallery.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">معرض الصور</span></a></li>

               

               

              
            </li>
          </ul>
        </div>
      </li>


      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">location_city</i><span class="menu-title" data-i18n="Templates">المدارس والفروع</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('branches.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية الجميع</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('branches.create') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">انشاء جديد</span></a></li>

 
          </ul>
        </div>
      </li>
    
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">clear_all</i><span class="menu-title" data-i18n="Templates">المراحل الدراسية</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('stages.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية الجميع</span></a></li>

 
          </ul>
        </div>
      </li>
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">attach_money</i><span class="menu-title" data-i18n="Templates">الأسعار</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('price.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية جميع الأسعار</span></a></li>

 
          </ul>
        </div>
      </li>
      
            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">attach_money</i><span class="menu-title" data-i18n="Templates">الأدوار والموظفين</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('roles.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية  الأدوار</span></a></li>

             <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('users.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية  الموظفين</span></a></li>

          </ul>
        </div>
      </li>
       <li class="bold @if(Route::is('show_bill_studnet')) active @endif" ><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">dvr</i><span class="menu-title" data-i18n="Templates">الأقساط والطلاب </span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
               <li><a class="collapsible-header waves-effect waves-cyan " href="{{ route('show_bill_studnet', 1) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط الثاني
        </span></a></li>

<li><a class="collapsible-header waves-effect waves-cyan  " href="{{ route('show_bill_studnet', 2) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط الثالث
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 3) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط الرابع
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 4) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط الخامس
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 5) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط السادس
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 6) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط السابع
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 7) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط الثامن
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 8) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط التاسع
        </span></a></li>
<li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('show_bill_studnet', 9) }}"><i
            class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير دافعي القسط العاشر
        </span></a></li>

          


               

               

              
            </li>
          </ul>
        </div>
      </li>
      @endif
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{route('father.index')}}"><i class="material-icons">people</i><span class="menu-title" data-i18n="Templates">أولياء الأمور </span></a>
      
      </li>
      @can('الطلاب')
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">attachment</i><span class="menu-title" data-i18n="Templates">طلبات تسجيل الطلاب</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion"> 
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('studnets.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">الطلبات المدفوعة</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('st_unpid') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">الطلبات الغير مدفوعة</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('student.withdrawnStudent') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">الطلاب المنسحبين</span></a></li>

            
          </ul>
        </div>
      </li>
      @endcan
               @if(Auth::user()->HasRole('اداري'))

            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">location_city</i><span class="menu-title" data-i18n="Templates">الموظفين</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('employes.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية الجميع</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('employes.index2') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">الموظفين المنتهي عملهم </span></a></li>

 
          </ul>
        </div>
      </li>
      @endif
            @can('الصفوف')

            <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">location_city</i><span class="menu-title" data-i18n="Templates">الصفوف</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion">
          
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('class.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية الجميع</span></a></li>

 
          </ul>
        </div>
      </li>
      @endcan
      @can('التوظيف')
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">person_add</i><span class="menu-title" data-i18n="Templates">طلبات التوظيف</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion"> 
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('job_app1.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">جميع الطلبات</span></a></li>

          </ul>
        </div>
      </li>
      @endcan
      @can('الدورات')
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="JavaScript:void(0)"><i class="material-icons">desktop_mac</i><span class="menu-title" data-i18n="Templates">الدورات</span></a>
        <div class="collapsible-body">
          <ul class="collapsible collapsible-sub" data-collapsible="accordion"> 
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('course.index') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">جميع الدورات</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('course.paid') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">طلبات الدورات المدفوعة</span></a></li>
            <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('course.unpaid') }}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">طلبات الدورات الغير مدفوعة</span></a></li>

          </ul>
        </div>
      </li>
      @endcan
      @can('التقارير')
<li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="/madares-kings/report/search"><i class="material-icons">find_in_page</i><span class="menu-title" data-i18n="Templates">التقارير</span></a>
    
    @endcan
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="/madares-kings/notification"><i class="material-icons">notifications</i><span class="menu-title" data-i18n="Templates">الإشعارات</span></a>

      </li>
      <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="{{ route('all_meesgae') }}"><i class="material-icons">notifications</i><span class="menu-title" data-i18n="Templates">رسائل اولياء الأمور</span></a>

      </li>

      






    
    </ul>
    

    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
  </aside>