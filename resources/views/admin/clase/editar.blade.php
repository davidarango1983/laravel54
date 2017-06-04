@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Clase {{' ID : '.$clase->id}} </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/editarclase') }}">
                        {{ csrf_field() }}

                        <input id="id" type="hidden" class="form-control" name="id"  value="<?php
                        if ((old('id') != null)) {
                            echo old('id');
                        } else {
                            isset($clase) ? print $clase->id : '';
                        }
                        ?>">

                        <div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
                            <label for="inicio" class="col-md-4 control-label">Hora de Inicio</label>

                            <div class="col-md-2">
                                <input id="inicio" type="time" class="form-control" required name="inicio" value="<?php
                                if ((old('inicio') != null)) {
                                    echo old('inicio');
                                } else {
                                    isset($clase) ? print substr($clase->hora_ini, 0, 5) : '';
                                }
                                ?>">


                                @if ($errors->has('inicio'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('inicio') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
                            <label for="fin" class="col-md-4 control-label">Hora de Finalización</label>

                            <div class="col-md-2">
                                <input id="fin" type="time" class="form-control" name="fin" value="<?php
                                       if ((old('fin') != null)) {
                                           echo old('fin');
                                       } else {
                                           isset($clase) ? print substr($clase->hora_fin, 0, 5) : '';
                                       }
                                ?>">

                                @if ($errors->has('fin'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('fin') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                            <label for="limit" class="col-md-4 control-label">Límite de Usuarios</label>

                            <div class="col-md-6">
                                <input id="limitClase" type="range" min="1" max="50" step="1" class="form-control" name="limit" value="<?php
                                if ((old('inicio') != null)) {
                                    echo old('limit');
                                } else {
                                    isset($clase) ? print $clase->limit : '';
                                }
                                ?>" >
                                <p id='infoLimit'><?php
                                if ((old('inicio') != null)) {
                                    echo old('limit');
                                } else {
                                    isset($clase) ? print $clase->limit : '';
                                }
                                ?></p>
                                @if ($errors->has('limit'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('limit') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dia') ? ' has-error' : '' }}">
                            <label for="dia" class="col-md-4 control-label">Día</label>

                            <div class="col-md-3">
                                <select id="dia" type="option" class="form-control" name="dia">
                                    @if (isset ($clase->dia))
                                    <option value='{{$clase->dia}}'>{{strtoupper($clase->dia)}}</option>
                                    @endif
                                    <option value='lunes'>LUNES</option>
                                    <option value='martes'>MARTES</option>
                                    <option value='miercoles'>MIÉRCOLES</option>
                                    <option value='jueves'>JUEVES</option>
                                    <option value='viernes'>VIERNES</option>
                                    <option value='sabado'>SÁBADO</option>
                                    <option value='domingo'>DOMINGO</option>
                                </select>
                                @if ($errors->has('dia'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('dia') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('publicado') ? ' has-error' : '' }}">
                            <label for="publicar" class="col-md-4 control-label">Publicar</label>

                            <div class="col-md-2">


                                @if (old('publicar') != null) 
                                @if (old('publicar')==1)  

                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO
                                @else
                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO
                                @endif                    
                                @else
                                @if ($clase->publicado==1)
                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO

                                @else 
                                <input type='radio'  name="publicar" value='1'/>SI
                                <input checked type='radio'  name="publicar" value='1'/>NO
                                @endif
                                @endif


                                @if ($errors->has('publicar'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('publicar') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('profesor') ? ' has-error' : '' }}">
                            <label for="profesor" class="col-md-4 control-label">Profesor</label>

                            <div class="col-md-4">
                                <select required id="profesor" class="form-control" name="profesor">

                                    @if (isset ($clase->profesor))
                                    <option value='{{$clase->profesor->id}}'>{{$clase->profesor->name}}<span>  </span>{{$clase->profesor->last_name}}</option>
                                    @endif
                                    @foreach ($profesores as $profesor)

                                    <option value={{$profesor->id}}>{{$profesor->name}}<span>  </span>{{$profesor->last_name}}</option>

                                    @endforeach

                                </select>
                                @if ($errors->has('profesor'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('profesor') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                            <label for="tipo" class="col-md-4 control-label">Tipo Clase</label>

                            <div class="col-md-4">
                                <select  id="tipo" class="form-control" name="tipo">
                                    @if (isset ($clase->tipo))
                                    <option value='{{$clase->tipo->id}}'>{{$clase->tipo->name}}</option>
                                    @endif   
                                    @foreach ($tipos as $tipo)

                                    <option value={{$tipo->id}}>{{$tipo->name}}</option>

                                    @endforeach

                                </select>
                                @if ($errors->has('tipo'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('tipo') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <a href="{{url('admin/clases')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-circle-o"></i> Editar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/timedropper.css')}}">
<script src="{{ URL::asset('js/timedropper.js')}}"></script>

<script src="{{ URL::asset('js/clases.js')}}"></script>

<script>$("#inicio").timeDropper();</script>
<script>$("#fin").timeDropper();</script>
@endsection
