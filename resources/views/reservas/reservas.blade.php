@extends('layouts.app2')
@section('content') 
<section class="container content-section text-center">
<div id='panelreserva'>
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
  

            <nav class="navbar navbar-custom navbar-inverse">
              
                    <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-dias">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand page-scroll" href="/">
                        <i class="fa fa-play-circle"></i> <span class="light">RESERVAS</span>
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
 


    <div id='contenidoadmin' class='panel panel-default container-fluid'>
        @yield('contenido')


    </div>

</div>
</section>

@endsection
