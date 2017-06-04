@extends('layouts.app')
@section('content') 
<section class="container content-section text-center">
    <div id='contClases' class="col-xs-10 col-xs-offset-1">
        <div class="panel panel-default">
            <nav class="black navbar navbar-custom ">             
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-dias">
                        DÍA <i class="fa fa-angle-double-down"></i> 
                    </button>
                    <a class="navbar-brand page-scroll" href="#">
                        <i class=""></i> <span class="light">RESERVAS</span>

                    </a>
                </div>
                <div class="collapse navbar-collapse" id="app-navbar-dias">
                    <!-- Left Side Of Navbar -->
                    <ul title="Lunes" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/lunes')}}">Lunes</a></li>
                    </ul>
                    <ul title="Martes" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/martes')}}">Martes</a></li>
                    </ul>
                    <ul title="Miércoles" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/miercoles')}}">Miércoles</a></li>
                    </ul>
                    <ul title="Jueves" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/jueves')}}">Jueves</a></li>
                    </ul>
                    <ul title="Viernes" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/viernes')}}">Viernes</a></li>
                    </ul>
                    <ul title="Sábado" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/sabado')}}">Sábado</a></li>
                    </ul>
                    <ul title="Domingo" class="nav navbar-nav">
                        <li><a href="{{url('reservaclases/domingo')}}">Domingo</a></li>
                    </ul>
                </div>

            </nav>
        </div>
        <div id='clasesList'class='panel panel-default container-fluid'>
            @yield('contenido')
        </div>
    </div>
</section>

@endsection
