@extends('layouts.adminapp')
@section('content')
<div class="content col-md-10 col-md-offset-1">  
    <div class="panel panel-default">
        <div class="panel-heading">Añadir Tipo de Clase</div>
        <div class="panel-body">
            <form id='tipoclase'class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('admin/createtipoclase') }}">
                {{ csrf_field() }}

                <i>Recuerda que ésta información será visible a los usuarios, sé descriptivo, informa al usuario del tipo de actividad que se va a realizar.</i><hr/>
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nombre</label>

                    <div class="col-md-2">
                        <input type="text" id="nombre" type="textarea" class="form-control" required name="name" value=''>{{old('name')}}
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('name') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
                

                <div class="col-md-12 form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-2 control-label">Descripción:</label><i> Utiliza el editor para crear un texto con estilo, puedres crear hypervínculos, darle formato al texto e incluso crear listas.</i>

                    <div class="col-md-10 col-md-offset-1">

                        <textarea name="description" cols="100" rows="10" maxlength="200">Describe la actividad a realizar</textarea>



                        @if ($errors->has('fin'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('description') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
                
                <div class="form-group">
                            <div class="col-md-6 col-md-offset-1">
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
<script src="{{ URL::asset('js/clases.js')}}"></script>
@endsection


