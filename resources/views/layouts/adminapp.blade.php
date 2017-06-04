<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GYMZONE') }}</title>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('/backend/css/appback.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/Growl/css/growl.css') }}">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css" />
        <link rel="stylesheet" type="text/css" href="{{ URL::asset('js/editor/jquery-te-1.4.0.css')}}">

        <script src="{{URL::asset('js/app.js')}}"></script>
        <script src="{{ URL::asset('js/editor/jquery-te-1.4.0.min.js')}}"></script>
        <script src="{{URL::asset('js/datedroppernuevo.js')}}"></script>
        <script src="{{URL::asset('css/Growl/js/growl.js')}}"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>

    </head>
    <body>
        <div class="col-sm-3 col-lg-2">
            <nav class="navbar navbar-inverse navbar-fixed-side">
                <div class="container">
                    <div class="navbar-header">
                        <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/admin">Administración <i class="fa fa-cog fa-1x" aria-hidden="true"></i></a>
                        <a class="navbar-brand" href="/">Ver Web <i class="fa fa-home fa-1x" aria-hidden="true"></i></a>
                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li id='usuarios' role='presentation' class="dropdown"><a class="dropdown-toggle" href="#">Usuarios</a>
                                <ul class="dropdown-menu" role='menu'>
                                    <li><a href="{{url('admin/usuarios')}}">Listar Usuarios</a></li>
                                </ul>
                            </li>
                            <li id='profesores' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Profesores<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role='menu'>
                                    <li><a href="{{url('admin/profesores')}}">Lista de Profesores</a></li>
                                    <li id='profesores'><a href="{{url('admin/anadirprofesor')}}">Añadir Profesor</a></li>
                                </ul>
                            </li>
                            <li id='clases' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Clases<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/clases')}}">Listar Clases</a></li>
                                    <li><a href="{{url('admin/anadirclase')}}">Añadir Clase</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('admin/tipoclases')}}">Listar Tipos de Clases</a></li>
                                    <li><a href="{{url('admin/anadirtipoclase')}}">Añadir Tipo de Clase</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('admin/reservas')}}">Listar Reservas</a></li>
                                </ul>
                            </li>
                            <li id='tipos' role="presentation" class="dropdown"> <a class="dropdown-toggle " data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false" >Suscripciones<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/tipos')}}">Listar tipos de Suscripción</a></li>
                                    <li><a href="{{url('admin/anadirtipo')}}">Añadir Tipo de Suscripción</a></li>
                                </ul>
                            </li>
                            <li id='noticias' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Noticias<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/noticias')}}">Listar Noticias</a></li>
                                    <li><a href="{{url('admin/anadirnoticia')}}">Añadir Noticia</a></li>
                                </ul>
                            </li>
                            <li id='imagenes' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Imágenes<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/imagenes')}}">Listar Imágenes</a></li>
                                    <li><a href="{{url('admin/anadirimagen')}}">Añadir Imagen</a></li>
                                </ul>

                            </li>
                            <li id='config' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" >Configuración<span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('admin/config')}}">Configuración</a></li>

                                </ul>

                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="admin container-fluid col-sm-9 col-lg-10">
            @if(Session::has('flash_message'))
            <div class="col-xs-12 text-center alert alert-success"><span></span><em> {!! session('flash_message') !!}</em></div>
            @endif
            @if(Session::has('flash_message_error'))
            <div class="col-xs-12  text-center alert alert-danger"><span></span><em> {!! session('flash_message_error') !!}</em></div>
            @endif
            @yield('content')
        </div>
    </body>
</html>