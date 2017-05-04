@extends('layouts.adminapp')
@section('content')
<div class="content col-md-10 col-md-offset-1">  
    <div class="panel panel-default">
        <div class="panel-heading">Editar Tipo de Clase</div>
        <div class="panel-body">
            <form id='tipoclase'class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('admin/updatetipoclase') }}">
                {{ csrf_field() }}
                <input id="id" type="hidden" class="form-control" name="id"  value="{{$tipo->id}}"/>
                <i>Recuerda que ésta información será visible a los usuarios, sé descriptivo, informa al usuario del tipo de actividad que se va a realizar.</i><hr/>
                <div class="form-group{{ $errors->has('inicio') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-2 control-label">Nombre</label>

                    <div class="col-md-2">
                        <input type="text" id="nombre" type="textarea" class="form-control" required name="name" value='<?php
                        if ((old('name') != null)) {
                            echo old('name');
                        } else {
                            isset($tipo) ? print $tipo->name : '';
                        }
                        ?>'>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('name') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
 

                <div class="col-md-12 form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
                    <label for="description" class="col-md-2 control-label">Descripción:</label>

                    <div class="col-md-10 col-md-offset-1">

                        <textarea name="description" cols="100" rows="10"><?php
                        if ((old('description') != null)) {
                            echo old('description');
                        } else {
                            isset($tipo) ? print $tipo->description : '';
                        }
                        ?></textarea>


                        @if ($errors->has('fin'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('fin') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-1">
                                <a href="{{url('admin/clases')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle-o"></i> Editar
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    </div>

</div>
<script src="{{ URL::asset('js/clases.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('js/editor/jquery-te-1.4.0.css')}}"> 
<script src="{{ URL::asset('js/editor/jquery-te-1.4.0.min.js')}}"></script>

@endsection


