@extends('layouts.adminapp')
<!--    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">-->
<script src="{{URL::asset('js/app.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/Growl/css/growl.css') }}">
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.13/datatables.min.css" />-->
<link rel="stylesheet" type="text/css" href="{{ URL::asset('js/editor/jquery-te-1.4.0.css')}}">
<script src="{{ URL::asset('js/editor/jquery-te-1.4.0.min.js')}}"></script>
<script src="{{ URL::asset('js/timedropper.js')}}"></script> @section('content')

<div id='paneladmin' class='container-fluid black'> 
        <div class="panel panel-default">
            <div class="panel-heading"><h3>ADMINISTRACIÓN</h3></div>
            <div id='admin' class="container-fluid ">
                <ul class="nav nav-pills">
                    <li id='usuarios'><a href="{{url('admin/usuarios')}}">Usuarios</a></li>
                    <li id='profesores' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profesores<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/profesores')}}">Lista de Profesores</a></li>
                            <li id='profesores'><a href="{{url('admin/anadirprofesor')}}">Añadir Profesor</a></li>
                        </ul>
                    </li>
                    <li id='clases' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Clases<span class="caret"></span>
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
                    <li id='tipos' role="presentation" class="dropdown"> <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Suscripciones<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/tipos')}}">Listar tipos de Suscripción</a></li>
                            <li><a href="{{url('admin/anadirtipo')}}">Añadir Tipo de Suscripción</a></li>
                        </ul>
                    </li>
                    <li id='noticias' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Noticias<span class="caret"></span>
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
                     <li id='config' role="presentation" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Configuración<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/config')}}">Configuración</a></li>
                            
                        </ul>
                       
                    </li>
                    
                    
                    
                       
                </ul>
            </div>
        </div>
        <div id='contenidoadmin' class='panel panel-default container-fluid'> @yield('contenido') @if(Request::is('*admin'))
            <p>Desde esta sección podrás administrar las clases, usuarios, noticias y muchas cosas más.</p> @endif </div>
    
</div> @endsection