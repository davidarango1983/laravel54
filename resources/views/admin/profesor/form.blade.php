@extends ('admin.admin')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Profesores</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/profesor'.$funcion) }}">
                        {{ csrf_field() }}
                        <input id="id" type="hidden" class="form-control" name="id"  value="<?php
                     
                            if ((old('id') != null)) {
                                echo old('id');
                            } else {
                           isset($profesor) ? print $profesor->id : '';
                            }
                            ?>">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="<?php
                     
                            if ((old('name') != null)) {
                                echo old('name');
                            } else {
                           isset($profesor) ? print $profesor->name : '';
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
                                <input id="apellido" type="text" class="form-control" name="apellido" value="<?php
                            if ((old('apellido') != null)) {
                                echo old('apellido');
                            } else {
                                 (isset($profesor)) ? print $profesor->last_name : '';
                            }
                            ?>">

                                @if ($errors->has('apellido'))
                                    <span class="help-block">
                                        <strong><i>{{ $errors->first('apellido') }}</i></strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                           <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                            <label for="apellido" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="dni" type="text"  minlength="9" maxlength="10" class="form-control" name="dni" value="<?php
                            if ((old('dni') != null)) {
                                echo old('dni');
                            } else {
                                  (isset($profesor)) ? print $profesor->dni : '';
                            }
                            ?>">

                                @if ($errors->has('dni'))
                                    <span class="help-block">
                                        <strong><i>{{ $errors->first('dni') }}</i></strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                            <label for="fecha de nacimiento" class="col-md-4 control-label">Fecha de Nacimiento</label>

                            <div class="col-md-6">
                                <input id="fecha" type="text" class="form-control" name="fecha"  data-lang="es"   data-min-year="1940"  value="<?php
                            if ((old('fecha') != null)) {
                                echo old('fecha');
                            } else {
                                 (isset($profesor)) ? print $profesor->fecha_nac : '';
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
                            if ((old('telefono') != null)) {
                                echo old('telefono');
                            } else {
                                  (isset($profesor)) ? print $profesor->telefono: '';
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
                                 isset($profesor) ? print $profesor->email : '';
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
                                <a href="{{url('admin/profesores')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle-o"></i> @if ($funcion=='update')
                                    Editar
                                @else
                                    Añadir
                                @endif
                                </button>
                            </div>
                        </div>

                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
