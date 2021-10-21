<div>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="sidebar-user-panel active">
                    <div class="user-panel">
                      
                    </div>
                    <div class="profile-usertitle">
                        <div class="sidebar-userpic-name"> {{ auth()->user()->name }} </div>
                        {{-- <div class="profile-usertitle-job ">{{ auth()->user()->role }} </div> --}}
                    </div>
                </li>
                {{-- <li class="active">
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="monitor"></i>
                        <span>Home</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="active">
                            <a href="index.html">Dashboard 1</a>
                        </li>
                        <li>
                            <a href="pages/dashboard/dashboard2.html">Dashboard 2</a>
                        </li>
                        <li>
                            <a href="pages/dashboard/dashboard3.html">Dashboard 3</a>
                        </li>
                    </ul>
                </li> --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i data-feather="monitor"></i>
                        <span>الرئيسية</span>
                    </a>
                </li>


                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="copy"></i>
                        <span>إعدادات الموقع</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('general.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">العناوين الرئيسية</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('config.edit') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">إعدادات النظام</span></a></li>

                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('slider.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">السلايدرات</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('about.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">من
                                    نحن</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('service.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">برامجنا الدراسية</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('study.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">مناهجنا التعليمية</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('about2.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">ميزات</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('review.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">آراء
                                    أولياء الامور</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('gallery.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">معرض
                                    الصور</span></a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="codepen"></i>
                        <span>المدارس والفروع </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('branches.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الجميع</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('branches.create') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">انشاء
                                    جديد</span></a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="command"></i>
                        <span>المراحل الدراسية </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('stages.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الجميع</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="dollar-sign"></i>
                        <span>الأسعار </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('price.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    جميع الأسعار</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="database"></i>
                        <span>الأدوار والموظفين </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('roles.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الأدوار</span></a></li>

                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('users.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الموظفين</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="users"></i>
                        <span>الأقساط والطلاب </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan "
                                href="{{ route('show_bill_studnet', 1) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط الثاني
                                </span></a></li>

                        <li><a class="collapsible-header waves-effect waves-cyan  "
                                href="{{ route('show_bill_studnet', 2) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط الثالث
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 3) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط الرابع
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 4) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط الخامس
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 5) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط السادس
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 6) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط السابع
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 7) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط الثامن
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 8) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط التاسع
                                </span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('show_bill_studnet', 9) }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">غير
                                    دافعي القسط العاشر
                                </span></a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ route('father.index') }}" class="menu-toggle">
                        <i data-feather="smile"></i>
                        <span>أولياء الأمور </span>
                    </a>

                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="database"></i>
                        <span>طلبات تسجيل الطلاب </span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('studnets.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">الطلبات المدفوعة</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan" href="{{ route('st_unpid') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">الطلبات الغير مدفوعة</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('student.withdrawnStudent') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">الطلاب
                                    المنسحبين</span></a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="user"></i>
                        <span>الموظفين</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('employes.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الجميع</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('employes.index2') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span
                                    data-i18n="Horizontal">الموظفين المنتهي عملهم </span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="cpu"></i>
                        <span>الصفوف</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('class.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">رؤية
                                    الجميع</span></a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="calendar"></i>
                        <span>طلبات التوظيف</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('job_app1.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">جميع
                                    الطلبات</span></a></li>

                    </ul>
                </li>
                <li>
                    <a href="#" onClick="return false;" class="menu-toggle">
                        <i data-feather="book-open"></i>
                        <span>الدورات</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('course.index') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">جميع
                                    الدورات</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('course.paid') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">طلبات
                                    الدورات المدفوعة</span></a></li>
                        <li><a class="collapsible-header waves-effect waves-cyan"
                                href="{{ route('course.unpaid') }}"><i
                                    class="material-icons">radio_button_unchecked</i><span data-i18n="Horizontal">طلبات
                                    الدورات الغير مدفوعة</span></a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('student.search') }}" class="menu-toggle">
                        <i data-feather="user"></i>
                        <span>التقارير</span>
                    </a>

                </li>
                <li>
                    <a href="{{ route('dashboard.notofication') }}"class="menu-toggle">
                        <i data-feather="bell"></i>
                        <span>الإشعارات</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('all_meesgae') }}"class="menu-toggle">
                        <i data-feather="mail"></i>
                        <span>رسائل اولياء الأمور</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- #Menu -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar" style="text-align: center; ">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" style="width:100%">
                <a href="#skins" data-bs-toggle="tab" class="active">المظهر</a>
            </li>

        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane in active in active stretchLeft" id="skins">
                <div class="demo-skin">
                    <div class="rightSetting">
                        <p style="text-align: center;">لون القائمة الجانبية</p>
                        <div class="selectgroup selectgroup-pills sidebar-color mt-3">
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="1"
                                    class="btn-check selectgroup-input select-sidebar" checked>
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                            </label>
                            <label class="selectgroup-item">
                                <input type="radio" name="icon-input" value="2"
                                    class="btn-check selectgroup-input select-sidebar">
                                <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                                    data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                            </label>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p style="text-align: center;">لون النظام</p>
                        <div class="btn-group theme-color mt-3" role="group"
                            aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" value="1" id="btnradio1"
                                autocomplete="off" checked>
                            <label class="radio-toggle btn btn-outline-primary" for="btnradio1">مضيء</label>
                            <input type="radio" class="btn-check" name="btnradio" value="2" id="btnradio2"
                                autocomplete="off">
                            <label class="radio-toggle btn btn-outline-primary " for="btnradio2">معتم</label>
                        </div>
                    </div>
                    <div class="rightSetting">
                        <p style="text-align: center;">الاتجاه </p>
                        <div class="switch mt-3">
                            <label>
                                <input type="checkbox" class="layout-change">
                                <span class="lever switch-col-red layout-switch"></span>
                            </label>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</div>
