@extends('layouts.adminapp')
@section('content')


<div class="container">

    <div class="panel panel-default col-lg-6 col-lg-offset-3">
        <div class="panel-heading">Editar Imagen</div>
        <div class="panel-body">


                    <form class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('/admin/createimagen') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-sm-2 control-label">Atributo 'Tittle'</label>

                            <div class="col-sm-10">
                                <input type="text" id="title" class="form-control"   name="title" value='{{old('title')}}'>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('title') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-sm-2 control-label">Atributo 'Alt'</label>

                            <div class="col-sm-10">
                                <input type="text" id="alt" class="form-control"   name="alt" value='{{old('alt')}}'>
                                @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('alt') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen" class="col-sm-2 control-label">Imagen</label>

                            <div class="col-sm-10">
                                <input id="urlimg" type="file" class="form-control" name="imagen" value="{{old('imagen')}}">


                                @if ($errors->has('imagen'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('imagen') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('publicar') ? ' has-error' : '' }}">
                            <label for="publicar" class="col-sm-2 control-label">Publicar</label>

                            <div class="col-sm-2">
                                <select id="publicar"  class="form-control " name="publicar" value="{{ old('publicar') }}">
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
                            <div class="col-md-6 col-md-offset-2">

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
