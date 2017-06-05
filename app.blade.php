<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>GYMZONE </title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/Growl/css/growl.css') }}">
    </head>

    <?php $barra = (url()->current() == url('/')) ? '#' : '/#'; ?>
    <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

        <!-- Navigation -->
        <nav class="navbar navbar-custom navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                        Menu <em class="fa fa-angle-double-down"></em> 
                    </button>
                    @if(url()->current() == url('/'))
                    <a class="navbar-brand page-scroll" href="#page-top"> 
                        <span class="light">GYMZONE</span>
                    </a>
                    @else
                    <a class="navbar-brand page-scroll" href="/">
                        <span class="light">GYMZONE</span>
                    </a>
                    @endif
                </div>

                <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>

                        <li>
                            <a class="page-scroll" href="/noticias">NOTICIAS</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="{{$barra}}activities">ACTIVIDADES</a>
                        </li>  
                        <li>
                            <a class="page-scroll" href="{{$barra}}about">QUIÉNES SOMOS</a>
                        </li> 
                        <li>
                            <a class="page-scroll" href="{{$barra}}galery">GALERIA</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="#contact">CONTACTO</a>
                        </li>


                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">INICIAR SESIÓN</a></li>
                        <li><a href="{{ url('/register') }}">REGISTRARSE</a></li>
                        @else

                        <li class=" dropdown">
                            <button  class='btn btn-default page-scroll' data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </button>

                            <ul class=" black dropdown-menu" role="menu" >
                                <li><a href="{{ url('/reservaclases') }}"><span class="fa fa-bicycle"></span> Reservar Clases</a></li>
                                <li><a href="{{ url('/perfil') }}"><span class="fa fa-user-circle-o"></span> Mi Perfil</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        <em class="fa fa-sign-out"></em> Cerrar Sesión
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                                @if(Auth::check() && Auth::user()->id_rol==2)
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ url('admin') }}"><span class="fa fa-lock"></span>  Administrar Web</a></li>
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
            <h2 class="text-center">Contacto</h2>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2>¿ Deseas más información ?</h2>
                    <p>No dudes en escribirnos. Te daremos toda la información que necesites. Y si quieres visitarnos estamos en la calle Paseo de la Ribera Nº1</p>
                    <p><a href="mailto:gymzonezaragoza@gmail.com">gymzonezaragoza@gmail.com</a>
                    </p>
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/" class="btn btn-default btn-lg"><em class="fa fa-twitter fa-fw"></em> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/davidarango1983/laravel54" class="btn btn-default btn-lg"><em class="fa fa-github fa-fw"></em> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com" class="btn btn-default btn-lg"><em class="fa fa-facebook fa-fw"></em> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
                <!-- Map Section -->
                <div id="map">

                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container text-center">

                <p>Gym Zone Zaragoza 2017</p>
                <p>Aviso Legal</p>
                <p>Política de Privacidad</p>
            </div>
        </footer>

        <script src="{{URL::asset('js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
        <!-- Google Maps API Key - Use your own API key to enable the map feature. More information on the Google Maps API can be found at https://developers.google.com/maps/ -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9hllqRn8l_ER1ON-3bAAKjc8uv4hZaZA"></script>
        <!--JavaScript -->
        <script src="{{URL::asset('js/principal.js')}}"></script>
    </body>

</html>
