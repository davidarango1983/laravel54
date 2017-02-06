@extends ('admin.admin')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Añadir Clase</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/createclase') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
                            <label for="inicio" class="col-md-4 control-label">Hora de Inicio</label>

                            <div class="col-md-2">
                                <input id="inicio" type="time" class="form-control" required name="inicio" value="{{ old('inicio') }}">

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
                                <input id="fin" type="time" class="form-control" name="fin" value="{{ old('fin') }}">

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
                                <input id="limitClase" type="range" min="1" max="50" step="1" class="form-control" name="limit" value='50' >
                                <p id='infoLimit'>50</p>
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
                                <select id="dia" type="option" class="form-control" name="dia" value="{{ old('dia') }}">
                                    <option value='lunes'>LUNES</option><option value='martes'>MARTES</option><option value='miercoles'>MIÉRCOLES</option><option value='jueves'>JUEVES</option><option value='viernes'>VIERNES</option><option value='sabado'>SÁBADO</option><option value='domingo'>DOMINGO</option>
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
                                <select id="publicar"  class="form-control" name="publicar" value="{{ old('publicar') }}">
                                    <option value='1'>SI</option>
                                    <option value='0'>NO</option>
                                </select>
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
                                        <option value="">Seleccione un profesor</option> 
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
                                  <option required value="">Seleccione el tipo de clase</option>        
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
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{url('admin/clases')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle-o"></i> Añadir
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
<script src="{{ URL::asset('js/clases.js')}}"></script>