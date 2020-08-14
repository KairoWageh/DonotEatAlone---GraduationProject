<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js">
    <![endif]-->
    <!--[if IE 9]>
    <html lang="en" class="ie9 no-js">
        <![endif]-->
        <!--[if !IE]><!-->
        <html lang="{{ app()->getLocale() }}">
            <!--<![endif]-->
            <!-- BEGIN HEAD -->
            <head>
                <meta charset="utf-8" />
                <title>{{__('site.donotEatAlone')}}
                    |
                    @yield('title')
                </title>
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta content="width=device-width, initial-scale=1" name="viewport" />
                <meta content="" name="description" />
                <meta content="" name="author" />
                <!-- BEGIN GLOBAL MANDATORY STYLES -->
                <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
                {!! Html::style('public/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
                {!! Html::style('public/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
                {!! Html::style('public/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
                {!! Html::style('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
                <!-- END GLOBAL MANDATORY STYLES -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                {!! Html::style('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css') !!}
                {!! Html::style('public/assets/global/plugins/morris/morris.css') !!}
                {!! Html::style('public/assets/global/plugins/fullcalendar/fullcalendar.min.css') !!}
                {!! Html::style('public/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') !!}
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL STYLES -->
                {!! Html::style('public/assets/global/css/components.min.css') !!}
                {!! Html::style('public/assets/global/css/plugins.min.css') !!}
                <!-- END THEME GLOBAL STYLES -->
                <!-- BEGIN THEME LAYOUT STYLES -->
                {!! Html::style('public/assets/layouts/layout/css/layout.min.css') !!}
                {!! Html::style('public/assets/layouts/layout/css/themes/darkblue.min.css') !!}
                {!! Html::style('public/assets/layouts/layout/css/custom.min.css') !!}
                <!-- END THEME LAYOUT STYLES -->
                @if(app()->getLocale() == 'ar')
                    {!! Html::style('public/assets/global/plugins/bootstrap/css/bootstrap-rtl.css') !!}
                    {!! Html::style('public/assets/layouts/layout/css/custom-rtl.css') !!}
                @endif
                @yield('header')
                <link rel="shortcut icon" href="favicon.ico" />
            </head>
            <!-- END HEAD -->
            <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
                <!-- BEGIN HEADER -->
                <div class="page-header navbar navbar-fixed-top">
                    <!-- BEGIN HEADER INNER -->
                    <div class="page-header-inner ">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="#">
                            <img src="{{Request::Root()}}/public/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> </a>
                            <div class="menu-toggler sidebar-toggler">
                                <span></span>
                            </div>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                        </a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li>
                                <div class="dropdown">
                                  <span>{{__('site.language')}}</span>
                                  <div class="dropdown-content" style="left:0;">
                                    <ul>
                                      <li>
                                        <a href="lang/en"> English </a>
                                      </li>
                                      <li>
                                        <a href="lang/ar"> العربية</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                            </li>
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default"> 7 </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>
                                            <span class="bold">12 pending</span> notifications
                                        </h3>
                                        <a href="page_user_profile.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">just now</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-success">
                                                <i class="fa fa-plus"></i>
                                                </span> New user registered. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">3 mins</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span> Server #12 overloaded. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">10 mins</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                                </span> Server #2 not responding. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">14 hrs</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                                </span> Application error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">2 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span> Database overloaded 68%. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">3 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span> A user IP blocked. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">4 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-warning">
                                                <i class="fa fa-bell-o"></i>
                                                </span> Storage Server #4 not responding dfdfdfd. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">5 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-info">
                                                <i class="fa fa-bullhorn"></i>
                                                </span> System Error. </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:;">
                                                <span class="time">9 days</span>
                                                <span class="details">
                                                <span class="label label-sm label-icon label-danger">
                                                <i class="fa fa-bolt"></i>
                                                </span> Storage server failed. </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="{{Request::Root()}}/public/uploads/{{Auth::user()->UserPhoto}}" />
                                <span class="username username-hide-on-mobile">  {{Auth::user()->UserName}}</span>
                                <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{url('/restaurantProfile/'. Auth::user()->id )}}">
                                        <i class="icon-user"></i> {{__('site.myProfile')}} </a>
                                    </li>
                                    <li class="divider"> </li>
                                    <li>
                                        <a  href="{{ route('restaurant.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> {{__('site.logOut')}} </a>
                                    </li>
                                    <form id="logout-form" action="{{url('/logout')}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                    <!-- END HEADER INNER -->
                </div>
                <!-- END HEADER -->
                <!-- BEGIN HEADER & CONTENT DIVIDER -->
                <div class="clearfix"> </div>
                <!-- END HEADER & CONTENT DIVIDER -->
                <!-- BEGIN CONTAINER -->
                <div class="page-container">
                    <!-- BEGIN SIDEBAR -->
                    <div class="page-sidebar-wrapper">
                        <!-- BEGIN SIDEBAR -->
                        <div class="page-sidebar navbar-collapse collapse">
                            <!-- BEGIN SIDEBAR MENU -->
                            <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-light " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                                <li class="sidebar-toggler-wrapper hide">
                                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                    <div class="sidebar-toggler">
                                        <span></span>
                                    </div>
                                    <!-- END SIDEBAR TOGGLER BUTTON -->
                                </li>
                                <li class="nav-item start active open">
                                    <a href="{{url('/restaurant')}}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">{{__('site.home')}}</span>
                                    <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{url('/reservations')}}" class="nav-link nav-toggle">
                                    <i class="fa fa-cutlery"></i>
                                    <span class="title">{{__('site.reservations')}}</span>
                                    <span class="selected"></span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a href="{{url('/restaurantProfile/'. Auth::user()->id )}}" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title">{{__('site.profile')}}</span>
                                    <span class="selected"></span>
                                    </a>
                                </li>
                            </ul>
                            <!-- END SIDEBAR MENU -->
                            <!-- END SIDEBAR MENU -->
                        </div>
                        <!-- END SIDEBAR -->
                    </div>
                    <!-- END SIDEBAR -->
                    <!-- BEGIN CONTENT -->
                    <div class="page-content-wrapper">
                        <!-- BEGIN CONTENT BODY -->
                        <div class="page-content">
                            @include('flash-message')
                            @yield('content')
                        </div>
                        <!-- END CONTENT BODY -->
                    </div>
                    <!-- END CONTENT -->
                    <!-- BEGIN QUICK SIDEBAR -->
                    <a href="javascript:;" class="page-quick-sidebar-toggler">
                    <i class="icon-login"></i>
                    </a>
                    <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                        <div class="page-quick-sidebar">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                                    <span class="badge badge-danger">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                                    <span class="badge badge-success">7</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                                    <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-bell"></i> Alerts </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-info"></i> Notifications </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-speech"></i> Activities </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                                            <i class="icon-settings"></i> Settings </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END QUICK SIDEBAR -->
                </div>
                <!-- END CONTAINER -->
                <!-- BEGIN FOOTER -->
                <div class="page-footer">
                    <div class="page-footer-inner"> 2017 &copy; {{__('site.donotEatAlone')}}
                    </div>
                    <div class="scroll-to-top">
                        <i class="icon-arrow-up"></i>
                    </div>
                </div>
                <!-- END FOOTER -->
                <!--[if lt IE 9]>
                {!! Html::script('assets/global/plugins/respond.min.js') !!}
                <
                {!! Html::script('assets/global/plugins/excanvas.min.js') !!}
                <![endif]-->
                <!-- BEGIN CORE PLUGINS -->
                {!! Html::script('public/assets/global/plugins/jquery.min.js') !!}
                {!! Html::script('public/assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
                {!! Html::script('public/assets/global/plugins/js.cookie.min.js') !!}
                {!! Html::script('public/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
                {!! Html::script('public/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}
                {!! Html::script('public/assets/global/plugins/jquery.blockui.min.js') !!}
                {!! Html::script('public/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
                <!-- END CORE PLUGINS -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
                {!! Html::script('public/assets/global/plugins/moment.min.js') !!}
                {!! Html::script('public/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') !!}
                {!! Html::script('public/assets/global/plugins/morris/morris.min.js') !!}
                {!! Html::script('public/assets/global/plugins/morris/raphael-min.js') !!}
                {!! Html::script('public/assets/global/plugins/counterup/jquery.waypoints.min.js') !!}
                {!! Html::script('public/assets/global/plugins/counterup/jquery.counterup.min.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/amcharts.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/serial.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/pie.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/radar.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/themes/light.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/themes/patterns.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amcharts/themes/chalk.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/ammap/ammap.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') !!}
                {!! Html::script('public/assets/global/plugins/amcharts/amstockcharts/amstock.js') !!}
                {!! Html::script('public/assets/global/plugins/fullcalendar/fullcalendar.min.js') !!}
                {!! Html::script('public/assets/global/plugins/horizontal-timeline/horozontal-timeline.min.js') !!}
                {!! Html::script('public/assets/global/plugins/flot/jquery.flot.min.js') !!}
                {!! Html::script('public/assets/global/plugins/flot/jquery.flot.resize.min.js') !!}
                {!! Html::script('public/assets/global/plugins/flot/jquery.flot.categories.min.js') !!}
                {!! Html::script('public/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') !!}
                {!! Html::script('public/assets/global/plugins/jquery.sparkline.min.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') !!}
                {!! Html::script('public/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') !!}
                <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN THEME GLOBAL SCRIPTS -->
                {!! Html::script('public/assets/global/scripts/app.min.js') !!}
                <!-- END THEME GLOBAL SCRIPTS -->
                <!-- BEGIN PAGE LEVEL SCRIPTS -->
                {!! Html::script('public/assets/pages/scripts/dashboard.min.js') !!}
                <!-- END PAGE LEVEL SCRIPTS -->
                <!-- BEGIN THEME LAYOUT SCRIPTS -->
                {!! Html::script('public/assets/layouts/layout/scripts/layout.min.js') !!}
                {!! Html::script('public/assets/layouts/layout/scripts/demo.min.js') !!}
                {!! Html::script('public/assets/layouts/global/scripts/quick-sidebar.min.js') !!}
                <!-- END THEME LAYOUT SCRIPTS -->
                @yield('footer')
            </body>
        </html>
