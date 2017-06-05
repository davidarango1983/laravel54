@extends('layouts.adminapp')
@section('content')

<div class="container">
    <div class="panel panel-default col-lg-6 col-lg-offset-3">
        <div class="panel-heading">Añadir Imagen</div>
        <div class="panel-body">
            <form class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('/admin/createimagen') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
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

                <div class="form-group{{ $errors->has('alt') ? ' has-error' : '' }}">
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
                <span>La imagen no debe pesar mas de 2mb y debe tener un ancho de 900px y una altura 506px.</span>
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

                 <div class="form-group{{ $errors->has('publicado') ? ' has-error' : '' }}">
                            <label for="publicar" class="col-sm-2 control-label">Publicar</label>

                            <div class="col-sm-3">
                                @if (old('publicar') != null) 
                                @if (old('publicar')==1)  
                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO
                                @else
                                <input type='radio'  name="publicar" value='1'/>SI
                                <input checked  type='radio'  name="publicar" value='0'/>NO
                                @endif                    
                                @else
                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO
                                @endif


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
