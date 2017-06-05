@extends('layouts.adminapp')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Noticia</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" enctype='multipart/form-data' action="{{ url('/admin/editarnoticia') }}">
                        {{ csrf_field() }}
                        <input id="id" type="hidden" class="form-control" name="id"  value="{{$noticia->id}}"/>

                        <div class="form-group{{ $errors->has('titulo') ? ' has-error' : '' }}">
                            <label for="titulo" class="col-md-2 control-label">Título</label>

                            <div class="col-md-6">
                                <input type="text" id="titulo" class="form-control" required name="titulo" value='<?php
                                if ((old('titulo') != null)) {
                                    echo old('titulo');
                                } else {
                                    isset($noticia) ? print $noticia->title : '';
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

                        <div class="col-md-12 form-group{{ $errors->has('contenido') ? ' has-error' : '' }}">
                            <label for="contenido" class="col-md-2 control-label">Descripción:</label><i> Utiliza el editor para crear un texto con estilo, puedres crear hypervínculos, darle formato al texto e incluso crear listas.</i>

                            <div class="col-md-10 col-md-offset-1">

                                <textarea name="contenido" class="jqte-test"><?php
                                    if ((old('contenido') != null)) {
                                        echo old('contenido');
                                    } else {
                                        isset($noticia) ? print $noticia->content : '';
                                    }
                                    ?></textarea>
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


                                @if ($errors->has('contenido'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('contenido') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('imagen') ? ' has-error' : '' }}">

                            <label for="imagen" class="col-md-2 col-sm-2 control-label">Imagen</label>                             

                            <div class="col-md-5 col-sm-6">
                                <input id="imagen" type="file" class="form-control" name="imagen">
                                <i>Por motivos de seguridad debe insertar la imagen manualmente.</i>


                                @if ($errors->has('imagen'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('urlimg') }}</i></strong>
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
                                <input  type='radio'  name="publicar" value='1'/>SI
                                <input checked type='radio'  name="publicar" value='0'/>NO
                                @endif                    
                                @else
                                @if ($noticia->publicado==1)
                                <input checked type='radio'  name="publicar" value='1'/>SI
                                <input type='radio'  name="publicar" value='0'/>NO
                                @else 
                                <input type='radio'  name="publicar" value='1'/>SI
                                <input checked type='radio'  name="publicar" value='0'/>NO
                                @endif
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
                                <a href="{{url('admin/noticias')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-circle-o"></i> Editar
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
