<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GYMZONE') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">

        <!-- Latest compiled and minified CSS -->



        <!-- Scripts -->
      
        <!-- Latest compiled and minified Jquery -->

    </head>

    <body id="app-layout">
        <div >
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <!-- Branding Image -->
                        <a class="navbar-brand" href="{{ url('/') }}">
                            GYM<span class="fa fa-star"></span>ZONEX               </a>
                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">





                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a class="fa fa-child"href="{{ url('/login') }}">  Iniciar Sesión</a></li>
                            <li><a class="fa fa-smile-o"href="{{ url('/register') }}">  Registrarse</a></li>


                            @else

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu fixed" role="menu">
                                 
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
                </div>
            </nav>
            </br>
            </br>

            </br>

            @yield('content')

             


        </div>
        
        <!-- JavaScripts -->
<!--        <script src="{{URL::asset('js/app.js')}}"></script>-->

        <link rel="stylesheet" href="{{ URL::asset('js/Growl/css/growl.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/datedroppernuevo.css') }}">
        <!-- Latest compiled and minified JavaScript -->
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>-->
    <!--   <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/dt-1.10.13/datatables.min.js"></script>-->
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
        <script src="{{URL::asset('js/datedroppernuevo.js')}}"></script>

        <script src="{{URL::asset('js/principal.js')}}"></script>
        <script src="{{URL::asset('js/Growl/js/growl.js')}}"></script>

    </body>

</html>