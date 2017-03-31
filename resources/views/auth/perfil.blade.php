@extends('layouts.app')

@section('content')
<div class="container">

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">{{ Auth::user()->name}}  {{Auth::user()->last_name}}  @if (Auth::user()->id_rol==2)
            <p>Administrador de GYM ZONE Zaragoza</p>
            @endif</div>
           
            <?php $sus = Auth::user()->suscripcion ?>
             <div class="panel-body">
                <div id="perfil">
                    <label><legend>Datos Personales</legend>
                        <p>Nombre : <span> {{ Auth::user()->name }}</span> </p>

                        <p>Apellidos : <span> {{ Auth::user()->last_name }}</span> </p>

                        <p>Fecha de Nacimiento : <span> {{ Auth::user()->fecha_nac }}</span> </p>
                    </label>
                    <hr/>

                    <label><legend>Contacto</legend>

                        <p>Teléfono : <span> {{ Auth::user()->telefono }}</span> </p>

                        <p>e-mail : <span> {{ Auth::user()->email }}</span> </p>

                    </label>
                    <hr/>

                    <label><legend>Suscripción</legend>
                        <p>Suscripción :  
                            @if($sus->fecha_fin < getdate() ) <span class='alert-success'> Activa </span></p>
                     
                        @else <span class="alert-danger">Inactiva</span><button id='btnpagar' class="btn btn-info">Pagar Suscripción</button>
                        @endif
                        <p>Fecha de inicio : {{$sus->fecha_ini}}</p>
                        <p>Fecha de finalización : {{$sus->fecha_fin}}</p>

                    </label>                 
                    <hr/>
                 
                    <a href="{{url('editar')}}" class='btn btn-sm btn-warning '> Editar</a>
                     


                            
                        </div>      
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
