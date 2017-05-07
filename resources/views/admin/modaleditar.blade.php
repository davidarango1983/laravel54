<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">{{$usuario->name}}<span> </span>{{ $usuario->last_name}}</h4>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Editar Usuario</div>
                       
                        <div class="panel-body">
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
                                        <input id="name" type="text" class="form-control" name="apellido" value="<?php
                                        if ((old('name') != null)) {
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
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong><i>{{ $errors->first('password') }}</i></strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                        @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                            <strong><i>{{ $errors->first('password_confirmation') }}</i></strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-user"></i>Editar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->


