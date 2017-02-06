@extends('layouts.app')
@section('content') 
<div id='panelreserva'>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
  

            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">

                        <!-- Collapsed Hamburger -->
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-dias">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                          <a class="navbar-brand" >
                  RESERVA</a>
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
                </div>
            </nav>
        </div>
 


    <div id='contenidoadmin' class='panel panel-default container-fluid'>
        @yield('contenido')


    </div>

</div>


@endsection
