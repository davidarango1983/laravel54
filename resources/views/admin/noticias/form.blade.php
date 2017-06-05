@extends ('layouts.adminapp')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Añadir Noticia</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('/admin/createnews') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-2 control-label">Título</label>

                            <div class="col-md-6">
                                <input type="text" id="titulo" class="form-control"   name="titulo" value='{{old('titulo')}}'>
                                @if ($errors->has('titulo'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('titulo') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12 form-group{{ $errors->has('contenido') ? ' has-error' : '' }}">
                            <label for="contenido" class="col-md-2 control-label">Contenido:</label>
                            @if ($errors->has('contenido'))
                            <span class="help-block">
                                <strong><i>{{ $errors->first('contenido') }}</i></strong>
                            </span>
                            @endif

                            <div class="col-md-10 col-md-offset-1">

                                <textarea  id='contenido' name="contenido" class="jqte-test">{{old('contenido')}}</textarea>
                                <i> Utiliza el editor para crear un texto con estilo, puedres crear hypervínculos, darle formato al texto e incluso crear listas.</i>

                                <script>
                                    $('.jqte-test').jqte();

                                    // settings of status
                                    var jqteStatus = true;
                                    $(".status").click(function ()
                                    {
                                        jqteStatus = jqteStatus ? false : true;
                                        $('.jqte-test').jqte({"status": jqteStatus});
                                    });
                                </script>


                                @if ($errors->has('fin'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('contenido') }}</i></strong>
                                </span>
                                @endif
                            </div>


                        </div>

                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">
                            <label for="imagen" class="col-md-2 col-sm-2 control-label">Imagen</label>

                            <div class="col-md-5 col-sm-6">
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
