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
                    <!-- CSRF Token -->
                    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                    {!! Html::style('public/assets/layouts/layout/css/chat.css') !!}
                    <!-- END THEME LAYOUT STYLES -->
                    @if(app()->getLocale() == 'ar')
                        {!! Html::style('public/assets/global/plugins/bootstrap/css/bootstrap-rtl.css') !!}
                        {!! Html::style('public/assets/layouts/layout/css/custom-rtl.css') !!}
                        {!! Html::style('public/assets/global/css/plugins-rtl.min.css') !!}
                     @endif
                    @yield('header')
                    <link rel="shortcut icon" href="favicon.ico" />
                    <script>
                        var base_url = '{{ url("/") }}';
                    </script>
                </head>
                <!-- END HEAD -->
                <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-content-white">
                    <!-- BEGIN HEADER -->
                    <div class="page-header navbar navbar-fixed-top">
                        <!-- BEGIN HEADER INNER -->
                        <div class="page-header-inner ">
                            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                            <span></span>
                            </a>
                            <!-- END RESPONSIVE MENU TOGGLER -->
                            <div class="page-logo">
                                <a href="index.html">
                                <img src="{{asset('public/assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default"> </a>
                                <div class="menu-toggler sidebar-toggler">
                                    <span></span>
                                </div>
                            </div>
                            <!-- END LOGO -->
                            <!-- END LOGO -->
                            <!-- BEGIN TOP NAVIGATION MENU -->
                            <div class="top-menu">
                                <ul class="nav navbar-nav pull-right">
                                    <!-- BEGIN LANGUAGE DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <span class="username username-hide-on-mobile">     {{__('site.language')}}
                                            </span>
                                            <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <li>
                                                <a href="lang/en">
                                                <i class="icon-globe"></i> English </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                                <a href="lang/ar">
                                                <i class="icon-globe"></i>  العربية </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- END LANGUAGE DROPDOWN -->

                                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                                    <!-- <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar"> -->
                                        <!-- <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-bell"></i>
                                        <span class="badge badge-default"> 7 </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                        </ul> -->
                                        <!-- <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                                            <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                                        </a>
                                        <div class="dropdown-container">
                                        <div class="dropdown-toolbar">
                                            <div class="dropdown-toolbar-actions">
                                                <a href="#">Mark all as read</a>
                                            </div>
                                            <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)</h3>
                                        </div>
                                        <ul class="dropdown-menu">
                                        </ul>
                                        <div class="dropdown-footer text-center">
                                            <a href="#">View All</a>
                                        </div>
                                      </div>
                                    </li> -->
                                    <!-- END NOTIFICATION DROPDOWN -->

                                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        
                                    <i class="icon-bell"></i>
                                    @if(auth()->user()->unreadNotifications->count() > 0)
                                        <span class="badge badge-default"> {{ auth()->user()->unreadNotifications->count() }}  </span>
                                    @endif
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="external">
                                            <h3>
                                                <span class="bold">{{ auth()->user()->unreadNotifications->count() }}  pending</span> notifications
                                            </h3>
                                            <a href="page_user_profile.html">view all</a>
                                        </li>
                                        <li>
                                            <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                                @foreach(auth()->user()->unreadNotifications as $notification)
                                                    <li>
                                                        <a onclick="markAsRead()">
                                                            <span class="time">9 days</span>
                                                            <span class="details">
                                                                <span class="label label-sm label-icon label-danger">
                                                                    <i class="fa fa-bolt"></i>
                                                                </span> 
                                                                <input type="hidden" id= "notification"value= {{ $notification->id }}>
                                                                <h6>{{ $notification->data['data'] }}</h6>
                                                            </span>
                                                        </a>
                                                    </li>
                                                @endforeach
                                                
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                    <!-- END NOTIFICATION DROPDOWN -->

                                    <!-- BEGIN INBOX DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <i class="icon-envelope-open"></i>
                                        <span class="badge badge-default"> 4 </span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="external">
                                                <h3>You have
                                                    <span class="bold">7 New</span> Messages
                                                </h3>
                                                <a href="app_inbox.html">view all</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- END INBOX DROPDOWN -->
                                    <!-- BEGIN USER LOGIN DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="../public/uploads/{{Auth::user()->UserPhoto}}">
                                        <span class="username username-hide-on-mobile"> {{Auth::user()->UserName}} </span>
                                        <i class="fa fa-angle-down"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-default">
                                            <li>
                                                <a href="{{url('/profile/'. Auth::user()->id )}}">
                                                <i class="icon-user"></i> {{__('site.myProfile')}} </a>
                                            </li>
                                            <li class="divider"> </li>
                                            <li>
                                            <a  href="{{ route('userLogout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="icon-key"></i> {{__('site.logOut')}} </a>
                                        </li>
                                        <form id="logout-form" action="{{url('/userLogout')}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </ul>
                                    </li>
                                    <!-- END USER LOGIN DROPDOWN -->
                                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                    <!-- <li class="dropdown dropdown-quick-sidebar-toggler">
                                        <a href="javascript:;" class="dropdown-toggle">
                                        <i class="icon-logout"></i>
                                        </a>
                                    </li> -->
                                </ul>
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
                                    <li class="nav-item  ">
                                        <a href="{{url('/home')}}" class="nav-link nav-toggle">
                                        <i class="icon-home"></i>
                                        <span class="title">{{__('site.home')}}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('/nearby')}}" class="nav-link nav-toggle">
                                        <i class="icon-map"></i>
                                        <span class="title">{{__('site.partnerNearby')}} </span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('/profile/'. Auth::user()->id )}}" class="nav-link nav-toggle">
                                        <i class="icon-user"></i>
                                        <span class="title">{{__('site.profile')}}</span>
                                        </a>
                                    </li>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('/friends')}}" class="nav-link nav-toggle">
                                        <i class="icon-users"></i>
                                        <span class="title">{{__('site.friends')}}</span>
                                        </a>
                                    </li>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{url('/myInvitations')}}" class="nav-link nav-toggle">
                                        <i class="icon-paper-plane"></i>
                                        <span class="title">{{__('site.invites')}}</span>
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
                        <!-- <a href="javascript:;" class="page-quick-sidebar-toggler">
                        <i class="icon-login"></i>
                        </a>
                        <div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
                            <div class="page-quick-sidebar">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Chat
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                                        <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                                            <ul class="media-list list-items"> -->
                                                <!-- BEGIN CONVERSATIONS -->
                                                <!-- <li class="media">
                                                    <div class="media-status">
                                                        <span class="badge badge-success">8</span>
                                                    </div>
                                                    <img class="media-object" src="../public/assets/layouts/layout/img/avatar3.jpg" alt="...">
                                                    <div class="media-body">
                                                        <h4 class="media-heading">Bob Nilson</h4>
                                                        <div class="media-heading-sub"> Project Manager </div>
                                                    </div>
                                                </li> -->
                                                <!-- END CONVERSATION -->
                                            <!-- </ul>
                                        </div>
                                        <div class="page-quick-sidebar-item">
                                            <div class="page-quick-sidebar-chat-user">
                                                <div class="page-quick-sidebar-nav">
                                                    <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                                    <i class="icon-arrow-left"></i>Back</a>
                                                </div>
                                                <div class="page-quick-sidebar-chat-user-messages"> -->
                                                    <!-- BEGIN MESSAGES -->
                                                    <!-- <div class="post out">
                                                        <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar3.jpg" />
                                                        <div class="message">
                                                            <span class="arrow"></span>
                                                            <a href="javascript:;" class="name">Bob Nilson</a>
                                                            <span class="datetime">20:15</span>
                                                            <span class="body"> When could you send me the report ? </span>
                                                        </div>
                                                    </div>
                                                    <div class="post in">
                                                        <img class="avatar" alt="" src="../public/assets/layouts/layout/img/avatar2.jpg" />
                                                        <div class="message">
                                                            <span class="arrow"></span>
                                                            <a href="javascript:;" class="name">Ella Wong</a>
                                                            <span class="datetime">20:15</span>
                                                            <span class="body"> Its almost done. I will be sending it shortly </span>
                                                        </div>
                                                    </div> -->
                                                    <!--END MESSAGES  -->
                                                <!-- </div>
                                                <div class="page-quick-sidebar-chat-user-form">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" placeholder="Type a message here...">
                                                        <div class="input-group-btn">
                                                            <button type="button" class="btn green">
                                                            <i class="icon-paper-clip"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            <!-- </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
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

                    <!-- kairo chat start -->

                    <div id="chat-overlay" class="row"></div>
     
                    <audio id="chat-alert-sound" style="display: none">
                        <source src="{{ asset('public/assets/chat-assets/sound/facebook_chat.mp3') }}" />
                    </audio>

                    <!-- kairo chat end -->

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
                    @yield('footer')
                    <!-- END THEME LAYOUT SCRIPTS -->

                    <!-- BEGIN CAHT SCRIPTS -->

                    {!! Html::script('public/assets/layouts/layout/scripts/pusher.min.js') !!}
                    {!! Html::script('public/assets/layouts/layout/scripts/chat.js') !!}
                    <!-- END CAHT SCRIPTS -->
                    <script type="text/javascript">
                        function markAsRead(){
                            var notification = document.getElementById('notification').value;
                            console.log(notification)
                        }
                    </script>
                    <!-- <script type="text/javascript">
                        var notificationsWrapper   = $('.dropdown-notifications');
                        var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
                        var notificationsCountElem = notificationsToggle.find('i[data-count]');
                        var notificationsCount     = parseInt(notificationsCountElem.data('count'));
                        var notifications          = notificationsWrapper.find('ul.dropdown-menu');

                        if (notificationsCount <= 0) {
                            notificationsWrapper.hide();
                        }

                        // Enable pusher logging - don't include this in production
                        // Pusher.logToConsole = true;

                        var pusher = new Pusher('API_KEY_HERE', {
                            encrypted: true
                        });

                        // Subscribe to the channel we specified in our Laravel Event
                        var channel = pusher.subscribe('notification');

                        // Bind a function to a Event (the full Laravel class)
                        channel.bind('App\\Events\\NewNotification', function(data) {
                            var existingNotifications = notifications.html();
                            var avatar = Math.floor(Math.random() * (71 - 20 + 1)) + 20;
                            var newNotificationHtml = `
                            <li class="notification active">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="media-object">
                                            <img src="https://api.adorable.io/avatars/71/`+avatar+`.png" class="img-circle" alt="50x50" style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <strong class="notification-title">`+data.message+`</strong>
                                        <!--p class="notification-desc">Extra description can go here</p-->
                                        <div class="notification-meta">
                                            <small class="timestamp">about a minute ago</small>
                                        </div>
                                    </div>
                                </div>
                            </li>`;
                            notifications.html(newNotificationHtml + existingNotifications);

                            notificationsCount += 1;
                            notificationsCountElem.attr('data-count', notificationsCount);
                            notificationsWrapper.find('.notif-count').text(notificationsCount);
                            notificationsWrapper.show();
                        });
                    <!-- </script> --> 
                </body>
            </html>
