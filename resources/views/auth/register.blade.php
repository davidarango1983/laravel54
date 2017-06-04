@extends('layouts.app')

@section('content')
<header class="intro">
    <div class="intro-body">
        <div class="container" id='containerregister'>
            <div class="login-card"><img src="{{ URL::asset('/images/logogym25.png') }}" class="profile-img-card">
                <div class="panel-heading">Registro de usuarios</div>
                <form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="">
                            <input id="name" type="text" class="form-control" name="name" placeholder="Nombre"value="{{ old('name') }}">

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('name') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <div class="">
                            <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellido"value="{{ old('apellido') }}">

                            @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('apellido') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <div class="">
                            <input id="fecha"  type="text" class="form-control" name="fecha" value="{{ isset($profesor->fecha_nac) ? $profesor->fecha_nac: ''}}" placeholder="Fecha de nacimiento" data-init-set="false"
                                   data-modal="true" data-large-default="true" data-large-mode="true"data-lang="es"   data-format="Y-m-d" data-min-year="1940" >

                            @if ($errors->has('fecha'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('fecha') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">

                        <div class="">
                            <input id="telefono" name='telefono' type="text" class="form-control picker-input" placeholder="Telefono" value="{{ old('telefono') }}">

                            @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('telefono') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                           
                        <div class="">
                            <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('email') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('suscripcion') ? ' has-error' : '' }}">                                
                        <div class="">
                            <select id="suscripcion" class="form-control" name="suscripcion" placeholder='' value="{{ old('suscripcion') }}">                                
                                @foreach ($datos as $suscripcion)
                                <option value="{{$suscripcion['id']}}">{{$suscripcion['name']}} {{$suscripcion['precio']}} €</option>
                                @endforeach
                            </select>

                            @if ($errors->has('suscripcion'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('suscripcion') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>                   

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                        <div class="">
                            <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('password') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div class="">
                            <input id="password-confirm" type="password" class="form-control" placeholder="Repetir contraseña" name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('password_confirmation') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class='form-group'>     

                        <input type='checkbox' name='condiciones' required>  <label>He leido y acepto las condiciones </label><a href='#modal-condiciones' data-toggle="modal" data-target="#modal-condiciones"> condiciones</a></input>
                    </div>


                    <div class="form-group">
                        <div class="">
                            <button type="submit" class="btn btn-primary col-xs-offset-3">
                                <i class="fa fa-btn fa-user"></i>Registrarse
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
        <!-- Modal -->
        <div id="modal-condiciones" class="modal fade" >
            <div class="modal-dialog">

                <!-- Modal content-->
                <div  style="color:black" class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Condiciones Legales</h4>
                    </div>
                    <div class="modal-body">
                        @include('auth.condiciones')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

</header>
@endsection



