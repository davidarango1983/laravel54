<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Grayscale - Start Bootstrap Theme</title>

        <!-- Bootstrap Core CSS -->

        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <!-- Custom Fonts -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

        <script src="{{URL::asset('js/app.js')}}"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        Menu <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="/">
                        <i class="fa fa-play-circle"></i> <span class="light">GYM</span>ZONE
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                       <?php (url()->current() == url('/'))? $barra='/' : $barra=''; ?>
                      
                         <li>
                            <a class="page-scroll" href="/noticias">NOTICIAS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="/#about">QUIÉNES SOMOS</a>
                        </li>                        
                        <li>
                            <a class="page-scroll" href="/#jobs">ACTIVIDADES</a>
                        </li>                  
                        <li>
                            <a class="page-scroll" href="/#download">GALERIA</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">CONTACTO</a>
                        </li>
                       
                       
                              <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">INICIAR SESIÓN</a></li>
                            <li><a href="{{ url('/register') }}">REGISTRARSE</a></li>


                            @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu fixed" role="menu">
                                    <li><a href="{{ url('/reservaclases') }}"><i class="fa fa-edit"></i> Reservar Clases</a></li>
                                    <li><a href="{{ url('/perfil') }}"><i class="fa fa-edit"></i> Mi Perfil</a></li>
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    @if(Auth::check() && Auth::user()->id_rol==2)
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{ url('admin') }}"><span class="glyphicons glyphicons-headphones"></span>  Administrar Web</a></li>
                                    @endif
                                </ul>
                            </li>
                            @endif
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        @yield('content')

        <!-- Contact Section -->
        <section id="contact" class="container content-section text-center">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>Contact Start Bootstrap</h2>
                    <p>Feel free to email us to provide some feedback on our templates, give us suggestions for new templates and themes, or to just say hello!</p>
                    <p><a href="mailto:feedback@startbootstrap.com">feedback@startbootstrap.com</a>
                    </p>
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/+Startbootstrap/posts" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- Map Section -->
        <div id="map"></div>

        <!-- Footer -->
        <footer>
            <div class="container text-center">
                <p>Copyright &copy; Your Website 2016</p>
            </div>
        </footer>





        <!-- Plugin JavaScript para transiciones -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>

        <!-- Theme JavaScript -->
        <script src="js/grayscale.js"></script>

        <!--JavaScript -->
        <script src="{{URL::asset('js/principal.js')}}"></script>
        <script src="{{URL::asset('js/Growl/js/growl.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
        <script src="{{URL::asset('js/datedroppernuevo.js')}}"></script>
    </body>

</html>
