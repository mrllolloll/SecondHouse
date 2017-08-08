<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<title>{{ config('app.name', 'Laravel') }}</title>
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{asset('/PaginaPublicaPrincipal/images/favicon.ico')}}">

		<!-- Web Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Raleway:700,400,300' rel='stylesheet' type='text/css'>

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
	</head>

	<body class="no-trans">
		<!-- scrollToTop -->
		<!-- ================ -->
		<div class="scrollToTop"><i class="icon-up-open-big"></i></div>

		<!-- header start -->
		<!-- ================ -->
		<header class="header fixed clearfix navbar navbar-fixed-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">

						<!-- header-left start -->
						<!-- ================ -->
						<div class="header-left clearfix">

							<!-- logo -->
							<div class="logo smooth-scroll">
								<a href="#banner"><img id="logo" src="{{asset('/css/Img/logo1.png')}}"></a>
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
												<li class="active"><a href="#banner">Inicio</a></li>
												<li><a href="#QuienesSomos">Quienes somos</a></li>
												<li><a href="#Faq">Faq</a></li>
												<li><a href="#Contact">Contactanos</a></li>
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
		<!-- header end -->
		<!-- banner start -->
		<!-- ================ -->
		<div id="banner" class="banner">
			<div class="banner-image"></div>
			<div class="banner-caption">
				<div class="container">
					<div class="row">
						<div class="col-md-9 col-md-offset-1">
							<h1 class="text-center">¿Que es <span>MySecondHouse</span>?</h1>
							<p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos debitis provident nulla illum minus enim praesentium repellendus ullam cupiditate reiciendis optio voluptatem, recusandae nobis quis aperiam, sapiente libero ut at.</p>
              <center class="hidden-xs hidden-sm"><iframe width="560" height="315" src="https://www.youtube.com/embed/wXL6HZVUof8" frameborder="0" allowfullscreen></iframe></center>
            </div>
					</div>
				</div>
			</div>
		</div>
		<!-- banner end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section clearfix " id="QuienesSomos">
			<div class="container">
        <div class="space"></div>
        <div class="row">
          <div class="col-md-6">
            <div class="media testimonial">
              <div class="media-left">
                <img src="/PaginaPublicaPrincipal/images/testimonial-1.png" alt="">
              </div>
              <div class="media-body">
                <center><h3 class="media-heading"><span>MISIÓN</span></h3></center>
                <blockquote>
                  <p>Proporcionamos seguridad, confianza y felicidad a nuestros clientes, permitiendo la interacción entre amantes de las mascotas para que puedan encontrar lugares llenos de amor y crear experiencias memorables.</p>
                </blockquote>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="media testimonial">
              <div class="media-left">
                <img src="/PaginaPublicaPrincipal/images/testimonial-2.png" alt="">
              </div>
              <div class="media-body">
                <center><h3 class="media-heading"><span>VISIÓN</span></h3></center>
                <blockquote>
                  <p>Ser una de las mejores plataformas virtuales a nivel mundial que le permitía a las personas encontrar un apoyo en el cuidado de sus mascotas de forma segura y confiable, ayudándolos a mejorar su calidad de vida y el de sus peluditos.</p>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-1 blue">
			<div class="container ">
				<h1 id="services"  class="text-center title">Nuestros Valores</h1>
				<div class="space"></div>
				<div class="row">
					<div class="col-sm-6">
						<div class="media">
							<div class="media-body text-right">
								<p>Respeto: Escuchamos, entendemos y valoramos las necesidades de nuestros asociados, promoviendo la armonía en las relaciones interpersonales, laborales y comerciales.</p>
							</div>
							<div class="media-right">

							</div>
						</div>
						<div class="media">
							<div class="media-body text-right">
								<p>Innovación: somos creativos y promovemos nuevas formas de pensar. Con el fin de conseguir los mejores resultados nuestros asociados tienen la posibilidad de darnos sus sugerencias y así ayudar en el crecimiento de la compañía.</p>
							</div>
							<div class="media-right">

							</div>
						</div>
						<div class="media">
							<div class="media-body text-right">
								<p>Servicio: adoptamos una actitud permanente de colaboración hacia nuestros asociados, respetamos las diferencias y tratamos de entender sus circunstancias para ir más allá de nuestras obligaciones y así ayudarles a buscar la mejor solución.</p>
							</div>
							<div class="media-right">

							</div>
						</div>
					</div>
					<div class="space visible-xs"></div>
					<div class="col-sm-6">
						<div class="media">
							<div class="media-left">

							</div>
							<div class="media-body">
								<p>Confianza: trabajamos con trasparencia y rectitud para actuar de forma coherente con nuestros pensamientos, sentimientos y valores. </p>
							</div>
						</div>
						<div class="media">
							<div class="media-left">

							</div>
							<div class="media-body">
								<p>Excelencia: Realizamos nuestro trabajo bien desde el principio. Con la convicción de entregar lo mejor nos esforzamos por hacer la diferencia en cada una de nuestras metas, buscamos el mejoramiento continuo y la máxima innovación, para conseguir resultados con calidad excepcional</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->
		<!-- section start -->
		<!-- ================ -->

		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section" id="Faq">
			<div class="container">
        <h1 class="text-center title" id="portfolio">FaQ</h1>
				<div class="separator"></div>
        <p class="lead text-center">Lorem ipsum dolor sit amet laudantium molestias similique.<br> Quisquam incidunt ut laboriosam.</p>

			</div>
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="section translucent-bg bg-image-2 pb-clear">
			<div class="container ">
        <br><br><br>
			</div>
			<!-- section start -->

			<!-- section end -->
		</div>
		<!-- section end -->

		<!-- section start -->
		<!-- ================ -->
		<div class="default-bg space">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1 class="text-center">Mas de 1000+ clientes felices</h1>
					</div>
				</div>
			</div>
		</div>
		<!-- section end -->

		<!-- footer start -->
		<!-- ================ -->
		<footer id="footer">

			<!-- .footer start -->
			<!-- ================ -->
			<div class="footer section" id="Contact">
				<div class="container">
					<h1 class="title text-center" id="contact">Contactanos!</h1>
					<div class="space"></div>
					<div class="row">
						<div class="col-sm-6">
							<div class="footer-content">
								<p class="large">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel nam magnam natus tempora cumque, aliquam deleniti voluptatibus voluptas. Repellat vel, et itaque commodi iste ab, laudantium voluptas deserunt nobis.</p>
								<ul class="list-icons">
									<li><i class="fa fa-map-marker pr-10"></i> One infinity loop, 54100</li>
									<li><i class="fa fa-phone pr-10"></i> +00 1234567890</li>
									<li><i class="fa fa-fax pr-10"></i> +00 1234567891 </li>
									<li><i class="fa fa-envelope-o pr-10"></i> your@email.com</li>
								</ul>
								<ul class="social-links">
									<li class="facebook"><a target="_blank" href=""><i class="fa fa-facebook"></i></a></li>
									<li class="twitter"><a target="_blank" href=""><i class="fa fa-twitter"></i></a></li>
									<li class="googleplus"><a target="_blank" href=""><i class="fa fa-google-plus"></i></a></li>
									<li class="skype"><a target="_blank" href=""><i class="fa fa-skype"></i></a></li>
									<li class="linkedin"><a target="_blank" href=""><i class="fa fa-linkedin"></i></a></li>
									<li class="youtube"><a target="_blank" href=""><i class="fa fa-youtube"></i></a></li>
									<li class="flickr"><a target="_blank" href=""><i class="fa fa-flickr"></i></a></li>
									<li class="pinterest"><a target="_blank" href=""><i class="fa fa-pinterest"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="footer-content">
								<form role="form" id="footer-form">
									<div class="form-group has-feedback">
										<label class="sr-only" for="name2">Name</label>
										<input type="text" class="form-control" id="name2" placeholder="Name" name="name2" required>
										<i class="fa fa-user form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="email2">Email address</label>
										<input type="email" class="form-control" id="email2" placeholder="Enter email" name="email2" required>
										<i class="fa fa-envelope form-control-feedback"></i>
									</div>
									<div class="form-group has-feedback">
										<label class="sr-only" for="message2">Message</label>
										<textarea class="form-control" rows="8" id="message2" placeholder="Message" name="message2" required></textarea>
										<i class="fa fa-pencil form-control-feedback"></i>
									</div>
									<input type="submit" value="Send" class="btn btn-default">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- .footer end -->

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
		<!-- footer end -->

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

    <script type="text/javascript">
    (function($){
      $(document).ready(function(){


        $(".banner-image").backstretch('{{asset("css/Img/gatos1.jpg")}}');

        // Fixed header
        //-----------------------------------------------
        $(window).scroll(function() {
          if (($(".header.fixed").length > 0)) {
            if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {
              $("body").addClass("fixed-header-on");
            } else {
              $("body").removeClass("fixed-header-on");
            }
          };
        });

        $(window).load(function() {
          if (($(".header.fixed").length > 0)) {
            if(($(this).scrollTop() > 0) && ($(window).width() > 767)) {
              $("body").addClass("fixed-header-on");
            } else {
              $("body").removeClass("fixed-header-on");
            }
          };
        });

        //Scroll Spy
        //-----------------------------------------------
        if($(".scrollspy").length>0) {
          $("body").addClass("scroll-spy");
          $('body').scrollspy({
            target: '.scrollspy',
            offset: 152
          });
        }

        //Smooth Scroll
        //-----------------------------------------------
        if ($(".smooth-scroll").length>0) {
          $('.smooth-scroll a[href*=#]:not([href=#]), a[href*=#]:not([href=#]).smooth-scroll').click(function() {
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
              if (target.length) {
                $('html,body').animate({
                  scrollTop: target.offset().top-151
                }, 1000);
                return false;
              }
            }
          });
        };
        // Isotope filters
    		//-----------------------------------------------
    		if ($('.isotope-container').length>0) {
    			$(window).load(function() {
    				$('.isotope-container').fadeIn();
    				var $container = $('.isotope-container').isotope({
    					itemSelector: '.isotope-item',
    					layoutMode: 'masonry',
    					transitionDuration: '0.6s',
    					filter: "*"
    				});
    				// filter items on button click
    				$('.filters').on( 'click', 'ul.nav li a', function() {
    					var filterValue = $(this).attr('data-filter');
    					$(".filters").find("li.active").removeClass("active");
    					$(this).parent().addClass("active");
    					$container.isotope({ filter: filterValue });
    					return false;
    				});
    			});
    		};

        //Modal
        //-----------------------------------------------
        if($(".modal").length>0) {
          $(".modal").each(function() {
            $(".modal").prependTo( "body" );
          });
        }
      }); // End document ready
      })(this.jQuery);
           $('a[href*="#"]').click(function() {
           if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
               && location.hostname == this.hostname) {
                   var $target = $(this.hash);
                   $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');
                   if ($target.length) {
                       var targetOffset = $target.offset().top;
                       $('html,body').animate({scrollTop: targetOffset}, 1000);
                       return false;
                  }
             }
         });
    </script>
	</body>
</html>
