 <header class="page-topbar" id="header">
        <div class="navbar navbar-fixed"> 
          <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark btn-danger gradient-shadow">
            <div class="nav-wrapper">
          
              <ul class="navbar-list right">
                <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light" href="https://storage.madares-abqary.com"><i class="material-icons">المخازن</i></a></li>
                <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a></li>
                <li class="hide-on-large-only search-input-wrapper"><a class="waves-effect waves-block waves-light search-button" href="javascript:void(0);"><i class="material-icons">search</i></a></li>
                <li><a class="waves-effect waves-block waves-light notification-button" id="read_not" href="javascript:void(0);" data-target="notifications-dropdown">
                   @php 
                  
                  $count= App\Notification::where('notifiable_id',Auth::id())->where('read_at',null)->count() ;
                  @endphp
                    <i class="material-icons">notifications_none<small class="notification-badge">{{$count}}</small></i></a></li>
                <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);" data-target="profile-dropdown"><span class="avatar-status avatar-online"><img src="{{asset('dashbord_style/app-assets/images/avatar/avatar-18.png')}}" alt="avatar"><i></i></span></a></li>
              </ul>
              <!-- translation-button-->
             
              <!-- notifications-dropdown-->
              <ul class="dropdown-content notifiuser" id="notifications-dropdown">
               
                <li>
                  <h6>NOTIFICATIONS<span class="new badge ">{{$count}}</span></h6>
                </li>
                <li class="divider "></li>
              
                
              </ul>
              <!-- profile-dropdown-->
              <ul class="dropdown-content" id="profile-dropdown">
                <!--<li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i> Profile</a></li>-->

                <li><a class="grey-text text-darken-1" href="{{ route('admin.logout') }}"><i class="material-icons">keyboard_tab</i> Logout</a></li>
              </ul>
            </div>
            <nav class="display-none search-sm">
              <div class="nav-wrapper">
                <form id="navbarForm">
                  <div class="input-field search-input-sm">
                    <input class="search-box-sm mb-0" type="search" required="" id="search" placeholder="Explore Materialize" data-search="template-list">
                    <label class="label-icon" for="search"><i class="material-icons search-sm-icon">search</i></label><i class="material-icons search-sm-close">close</i>
                    <ul class="search-list collection search-list-sm display-none"></ul>
                  </div>
                </form>
              </div>
        
          </nav>
        </div>
      </header>