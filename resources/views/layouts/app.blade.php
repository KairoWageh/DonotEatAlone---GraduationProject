<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="{{ app()->getLocale() }}">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>{{__('site.donotEatAlone')}}|
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
         @if(app()->getLocale() == 'ar')
            {!! Html::style('public/assets/global/plugins/bootstrap/css/bootstrap-rtl.css') !!}
            
         @endif

         {!! Html::style('public/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}


        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         {!! Html::style('public/assets/global/plugins/select2/css/select2.min.css') !!}

         {!! Html::style('public/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!}

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
         {!! Html::style('public/assets/global/css/components.min.css') !!}

         {!! Html::style('public/assets/global/css/plugins.min.css') !!}

        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
         {!! Html::style('public/assets/pages/css/login-4.min.css') !!}

        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> 
        <style type="text/css">
            .nav-menu ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }

            .nav-menu > ul {
                display: flex;
            }

            .nav-menu > ul > li {
                position: relative;
                white-space: nowrap;
                padding: 10px 0 10px 25px;
            }

            .nav-menu a {
              display: block;
              /*position: relative;
              color: #fff;*/
              transition: 0.3s;
              font-size: 15px;
              padding: 0 4px;
              letter-spacing: 0.4px;
              font-family: "Poppins", sans-serif;
            }
            /*--------------------------------------------------------------
            # Language dropdown
            --------------------------------------------------------------*/
            .dropdown {
              position: relative;
              display: inline-block;
            }

            .dropdown span{
              color: #fff;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              right: 0;
              background-color: #f9f9f9;
              min-width: 160px;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
              z-index: 1;
            }

            .dropdown-content a {
              color: #66560e !important;
              /*padding: 12px 16px;*/
              text-decoration: none;
              /*display: block;*/
            }

            .dropdown-content a:hover {
              color: #fff !important;
              background-color: #66560e;
              text-decoration: none;
            }
            .dropdown:hover .dropdown-content {display: block;}
            .dropdown:hover .dropbtn {background-color: #3e8e41;}
        </style>
    </head>
    <!-- END HEAD -->
<body id=" login">
     <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <nav class="nav-menu d-none d-lg-block">
        <ul style="float: left;">
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
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
  <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">

                <img src="{{Request::Root()}}/public/assets/pages/img/logo-big.png" alt="logo" />
            </a>
        </div>
         <!-- END LOGO -->
                <!-- BEGIN LOGIN -->
                <div class="content">



@yield('content')


  </div>
        <!-- END LOGIN -->

        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> 2017 &copy;{{__('site.donotEatAlone')}} </div>
        <!-- END COPYRIGHT -->
        <!--[if lt IE 9]>


 {!! Html::script('assets/global/plugins/respond.min.js') !!}


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
         {!! Html::script('public/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') !!}

         {!! Html::script('public/assets/global/plugins/jquery-validation/js/additional-methods.min.js') !!}

         {!! Html::script('public/assets/global/plugins/select2/js/select2.full.min.js') !!}

         {!! Html::script('public/assets/global/plugins/backstretch/jquery.backstretch.min.js') !!}


        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         {!! Html::script('public/assets/global/scripts/app.min.js') !!}

        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         {!! Html::script('public/assets/pages/scripts/login-4.min.js') !!}

        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->


        @yield('footer')
    </body>
</html>
