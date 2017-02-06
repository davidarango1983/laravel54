@extends('layouts.app')

@section('content')
<div class="row">      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Editar Usuario</div>
            <div class="panel-body">
                <div class='col-md-8 col-md-offset-2'>
                    <p>Por seguridad, si deseas cambiar tu contraseña, ve a Iniciar sesión, he olvidado mi contraseña y te enviaremos un correo para que
                        cambies tu contraseña.</p>
                    <p>Si deseas cambiar tu suscripción deberás esperar a su vencimiento y activarla nuevamente.
                    </p>
                </div>
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/update') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Nombre</label>

                        <div class="col-md-6">
                            <input id="id" type="hidden" class="form-control" name="id"  value="{{$usuario->id}}">
                            <input id="name" type="text" class="form-control" name="name" value="<?php
                            if ((old('name') != null)) {
                                echo old('name');
                            } else {
                                echo $usuario->name;
                            }
                            ?>">

                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('name') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <label for="apellido" class="col-md-4 control-label">Apellidos</label>

                        <div class="col-md-6">
                            <input id="last_name" type="text" class="form-control" name="apellido" value="<?php
                            if ((old('last_name') != null)) {
                                echo old('last_name');
                            } else {
                                echo $usuario->last_name;
                            }
                            ?>">

                            @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('apellido') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                        <label for="fecha de nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>

                        <div class="col-md-6">
                            <input id="fecha" type="text" class="form-control" name="fecha" value="<?php
                            if ((old('fecha') != null)) {
                                echo (old('fecha'));
                            } else {
                                echo ($usuario->fecha_nac);
                            }
                            ?>">

                            @if ($errors->has('fecha'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('fecha') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                        <label for="telefono" class="col-md-4 control-label">Teléfono</label>

                        <div class="col-md-6">
                            <input id="telefono" type="tel" class="form-control" name="telefono" value="<?php
                            if ((old('name') != null)) {
                                echo old('telefono');
                            } else {
                                echo $usuario->telefono;
                            }
                            ?>">
                            @if ($errors->has('telefono'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('telefono') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="<?php
                            if ((old('email') != null)) {
                                echo old('email');
                            } else {
                                echo $usuario->email;
                            }
                            ?>">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('email') }}</i></strong>
                            </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <a href="{{url('perfil')}}"class="btn btn-default">Cancelar</a>
                            
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-circle-o"></i>Editar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
