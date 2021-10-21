<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="#" onClick="return false;" class="navbar-toggle collapsed" data-bs-toggle="collapse"
                data-bs-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="#" onClick="return false;" class="bars"></a>
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
                {{-- <img src="https://madares-abqary.com/uploads/site_logo/7KlIYLEG6UbFTU8N08bl2UR0uwhliCilmAbT9IB9.png" alt="" /> --}}
                <span class="logo-name" style="font-size:20px">{{ App\Config::first()->title }}</span>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="pull-left">
                <li>
                    <a href="#" onClick="return false;" class="sidemenu-collapse">
                        <i class="material-icons">reorder</i>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="fas fa-expand"></i>
                    </a>
                </li>
                <li class="dropdown dropdown-notifications">
                    @php
                        $notifications = auth()->user()->unreadNotifications;
                        $count = auth()->user()->unreadNotifications->count();

                    @endphp
                    <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"data-toggle="dropdown"
                        role="button">
                        <i class="far fa-bell"></i>
                        <span class="notif-count"  data-count="{{ $count }}">{{ $count }}</span>
                    </a>
                    <ul class="dropdown-menu pullDown" style="height: auto;" >
                        <li class="header">الاشعارات</li>
                        <li class="body" style="width: 100%">

                            <ul class="menu" >
                                  
                         
                                <li class="scrollable-container">
                                    @forelse  ($notifications as $item)

                                    <a  >
                                        <span class="table-img msg-user">
                                            <img src="https://e7.pngegg.com/pngimages/442/477/png-clipart-computer-icons-user-profile-avatar-profile-heroes-profile-thumbnail.png" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">{{$item->data['title'] }}</span>
                                            <span class="menu-desc">
                                                <i class="material-icons"></i> 
                                            </span>
                                        </span>
                                    </a>
                                    @empty
                                    <a class="delll" style="color: black;text-align: center" href="#" onClick="return false;">لا يوجد اشعارات</a>
                                    @endforelse
                                </li>
                          

                              
                            </ul>

                        </li>
                       
                    </ul>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- #START# Notifications-->
                
                    




                    <li class="dropdown user_profile" id="cart_items">


                </li>





                    <ul class="dropdown-menu pullDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Sarah Smith</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user2.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Airi Satou</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user3.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user4.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Ashton Cox</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user5.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Cara Stevens</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user6.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Charde Marshall</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onClick="return false;">
                                        <span class="table-img msg-user">
                                            <img src="assets/images/user/user7.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> Yesterday
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#" onClick="return false;">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications-->
                <li class="dropdown user_profile">
                    <a href="#" onClick="return false;" class="dropdown-toggle" data-bs-toggle="dropdown"
                        role="button">
                        <img src="https://w7.pngwing.com/pngs/312/283/png-transparent-man-s-face-avatar-computer-icons-user-profile-business-user-avatar-blue-face-heroes.png" width="60" height="32" alt="User">
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                              
                                
                                <li>
                                    <a href="{{ route('admin.logout') }}">
                                        <i class="material-icons">power_settings_new</i>تسجيل خروج
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    <a href="#" onClick="return false;" class="js-right-sidebar" data-close="true">
                        <i class="fas fa-cog"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>