@extends('layouts.adminapp')
@section('content')

<div class="container"> 
    
    <div class="col-sm-12"><img class="img-responsive img-rounded center-block"src="/images/{{$imagen->urlimg}}" ></img>
                <p class="text text-center">Imagen actual en base de datos</p>
    </div>
    <div class="panel panel-default col-sm-6 col-sm-offset-3">
        
        <div class="panel-heading">Editar Imagen</div>
        <div class="panel-body">

            <form class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('/admin/updateimagen') }}">
                {{ csrf_field() }}
                <input id="id" type="hidden" class="form-control" name="id"  value="{{$imagen->id}}"/>

                <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                    <label for="titulo" class="col-sm-2 control-label">Atributo 'Title'</label>

                    <div class="col-sm-10">
                        <input type="text" id="titulo" class="form-control" required name="title" value='<?php
                        if ((old('titulo') != null)) {
                            echo old('titulo');
                        } else {
                            isset($imagen) ? print $imagen->title : '';
                        }
                        ?>
                               '>
                        @if ($errors->has('titulo'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('titulo') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
                    <label for="titulo" class="col-sm-2 control-label">Atributo 'Title'</label>

                    <div class="col-sm-10">
                        <input type="text" id="alt" class="form-control" required name="alt" value='<?php
                        if ((old('alt') != null)) {
                            echo old('alt');
                        } else {
                            isset($imagen) ? print $imagen->alt : '';
                        }
                        ?>
                               '>
                        @if ($errors->has('alt'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('alt') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
               

                <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">

                    <label for="imagen" class="col-sm-2 control-label">Imagen</label>                             
  <span>La imagen no debe pesar mas de 2mb y debe tener un ancho de 900px y una altura 506px.</span>
                    <div class="col-sm-10">
                        <input id="imagen" type="file" class="form-control" name="imagen">
                        <i>Por motivos de seguridad debe insertar la imagen manualmente.</i>


                        @if ($errors->has('imagen'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('urlimg') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('publicar') ? ' has-error' : '' }}">
                    <label for="publicar" class="col-sm-2 control-label">Publicar</label>

                    <div class="col-sm-2">
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
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-2">
                        <a href="{{url('admin/imagenes')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-circle-o"></i> Editar
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
