<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('/PaginaPublicaPrincipal/images/favicon.ico')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>
    <!-- jqueryui core CSS -->
		<link href="{{asset('/Jqueryui/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- Bootstrap core CSS -->
		<link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <!-- Font Awesome CSS -->
		<link href="{{asset('/PaginaPublicaPrincipal/fonts/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

		<!-- Plugins -->
		<link href="{{asset('/PaginaPublicaPrincipal/css/animations.css')}}" rel="stylesheet">

		<!-- Worthy core CSS file -->
		<link href="{{asset('/PaginaPublicaPrincipal/css/style.css')}}" rel="stylesheet">

		<!-- Custom css -->
		<link href="{{asset('/PaginaPublicaPrincipal/css/custom.css')}}" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="no-trans fixed-header-on">
  <div class="scrollToTop"><i class="icon-up-open-big"></i></div>
    <div id="app">
      <header class="header fixed clearfix navbar navbar-fixed-top">
        <div class="container">
          <div class="row">
            <div class="col-md-4">

              <!-- header-left start -->
              <!-- ================ -->
              <div class="header-left clearfix">

                <!-- logo -->
                <div class="logo smooth-scroll">
                  <a href="{{ url('/') }}"><img id="logo" src="{{asset('/css/Img/logo1.png')}}"></a>
                </div>

                <!-- name-and-slogan -->
                <div class="site-name-and-slogan smooth-scroll">
                  <div class="site-name"><a href="#banner">{{ config('app.name', 'Laravel') }}</a></div>
                  <div class="site-slogan">

                </div>
                </div>
              </div>
              <!-- header-left end -->
            </div>
            <div class="col-md-8">
              <!-- header-right start -->
              <!-- ================ -->
              <div class="header-right clearfix">
                <!-- main-navigation start -->
                <!-- ================ -->
                <div class="main-navigation animated">
                  <!-- navbar start -->
                  <!-- ================ -->
                  <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                      <!-- Toggle get grouped for better mobile display -->
                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                      </div>

                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse scrollspy smooth-scroll" id="navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                          @if (Auth::guest())
                              <li><a href="{{ url('/login') }}">Login</a></li>
                              <li><a href="{{ url('/register') }}">Register</a></li>
                          @else
                              <li class="dropdown">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      {{ ucfirst(Auth::user()->first_name) }} <span class="caret"></span>
                                  </a>
                                  <ul class="dropdown-menu" role="menu">
                                      <li>
                                          <a href="/usersControl/{{ Auth::user()->id }}">
                                              Perfil
                                          </a>
                                          <form id="profile" action="{{ url('/profile') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>
                                      @if(Auth::user()->level==3)
                                          <li>
                                          <a href="{{ url('/adminPanel') }}">
                                              Administración
                                          </a>
                                      </li>
                                      @endif
                                      <li>
                                          <a href="{{ url('/logout') }}"
                                              onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                              Salir
                                          </a>
                                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                              {{ csrf_field() }}
                                          </form>
                                      </li>
                                  </ul>
                              </li>
                          @endif
                        </ul>
                      </div>

                    </div>
                  </nav>
                  <!-- navbar end -->

                </div>
                <!-- main-navigation end -->

              </div>
              <!-- header-right end -->

            </div>
          </div>
        </div>
      </header>
      <br><br><br> <br><br> <br><br>
        @yield('content')
    </div>
    <footer id="footer">
      <!-- .subfooter start -->
      <!-- ================ -->
      <div class="subfooter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <p class="text-center">Copyright © 2016 <a target="_blank" href="">{{ config('app.name', 'Laravel') }}</a>.</p>
            </div>
          </div>
        </div>
      </div>
      <!-- .subfooter end -->

    </footer>
    <!-- Scripts -->
    <!-- JavaScript files placed at the end of the document so the pages load faster
    ================================================== -->
    <!-- Jquery and Bootstap core js files -->
    <script src="{{asset('/js/app.js')}}"></script>

    <script src="{{asset('/jqueryui/jquery-ui.min.js')}}"></script>


    <!-- Modernizr javascript -->

    <!-- Isotope javascript -->
    <script type="text/javascript" src="{{asset('/PaginaPublicaPrincipal/plugins/isotope/isotope.pkgd.min.js')}}"></script>

    <!-- Backstretch javascript -->
    <script type="text/javascript" src="{{asset('/PaginaPublicaPrincipal/plugins/jquery.backstretch.min.js')}}"></script>

    <!-- Appear javascript -->
    <script type="text/javascript" src="{{asset('/PaginaPublicaPrincipal/plugins/jquery.appear.js')}}"></script>

    <!-- Initialization of Plugins -->
    <script type="text/javascript" src="{{asset('/PaginaPublicaPrincipal/js/template.js')}}"></script>

    <!-- Custom Scripts -->
    <script type="text/javascript" src="{{asset('/PaginaPublicaPrincipal/js/custom.js')}}"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCfJncYA9XDBb2fiUF5ApyefEnwnZODF4&callback=initAutocomplete&libraries=places"></script>
    
    <script type="text/javascript">
         $( function() {
            $( ".DateP" ).datepicker();
          });

    </script>
</html>
