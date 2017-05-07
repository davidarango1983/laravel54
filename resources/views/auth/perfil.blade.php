@extends('layouts.app')
@section('content')
<header class="intro">
    <div class="intro-body">
           <div class="container panel panel-default perfil">
            <div class="panel-heading">{{ Auth::user()->name}}  {{Auth::user()->last_name}}  @if (Auth::user()->id_rol==2)
                <p>Administrador de GYM ZONE Zaragoza</p>
                @endif</div>
            <?php $sus = Auth::user()->suscripcion ?>
            <div class="panel-body">
                 @if(Session::has('flash_message'))
                        <div class="col-xs-12 text-center alert alert-success"><span></span><em> {!! session('flash_message') !!}</em></div>
                        @endif
                        @if(Session::has('flash_message_error'))
                        <div class="col-xs-12  text-center alert alert-danger"><span></span><em> {!! session('flash_message_error') !!}</em></div>
                        @endif
                <div class='col-lg-6'id="perfil">
                    
                    <label><legend>Datos Personales</legend>
                        <p>Nombre : <span> {{ Auth::user()->name }}</span> </p>

                        <p>Apellidos : <span> {{ Auth::user()->last_name }}</span> </p>

                        <p>Fecha de Nacimiento : <span> {{ Auth::user()->fecha_nac }}</span> </p>
                    </label>
                </div>

                <div class='col-lg-6'>
                    <label><legend>Contacto</legend>

                        <p>Teléfono : <span> {{ Auth::user()->telefono }}</span> </p>

                        <p>e-mail : <span> {{ Auth::user()->email }}</span> </p>

                    </label>
                </div>
                <div class='clearfix'></div>

                <div class='col-lg-6'>
                    <label><legend>Suscripción</legend>
                        <p>Suscripción :                        
                            @if(App\Jobs\Utiles::cuentaActiva(Auth::user())) <span class='alert-success'> Activa </span></p>

                        @else <span class="alert-danger">Inactiva</span><button id='btnpagar' class="btn btn-info">Pagar Suscripción</button>
                        @endif
                        <p>Inicio : {{$sus->fecha_ini}}</p>
                        <p>Finalización : {{$sus->fecha_fin}}</p>

                    </label>   
                </div>
                <div class="clearfix"></div>
<div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{url('home')}}"class="btn btn-default">Cancelar</a>
                            
                            <a  href="{{url('editar')}}" class="btn btn-primary">
                                <i class="fa fa-check-circle-o"></i>Editar
                            </a>
                        </div>
                    </div>
              
            </div>

        </div>
    </div>
</header>
@endsection
 