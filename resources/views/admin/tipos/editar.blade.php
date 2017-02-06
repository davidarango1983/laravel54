@extends ('admin.admin')
@section('contenido')

<div class="content col-md-10 col-md-offset-1">  
    <div class="panel panel-default">
        <div class="panel-heading">Editar Tipo de Suscripción</div>
        <div class="panel-body">


            <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/updatetipo') }}">
                {{ csrf_field() }}
                <input id="id" type="hidden" class="form-control" name="id" value="{{$tipo->id}}"> 
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 col-sm-4 control-label">Nombre</label>

                    <div class="col-md-6 col-sm-6">
                        <input id="name" type="text" class="form-control" name="name" value="<?php
                        if ((old('name') != null)) {
                            echo old('name');
                        } else {
                            echo $tipo->name;
                        }
                        ?>"> 

                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('name') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('precio') ? ' has-error' : '' }}">
                    <label for="apellido" class="col-md-4 col-sm-4 control-label">Precio €</label>

                    <div class="col-md-2 col-sm-2">
                        <input id="precio" type="number" class="form-control" name="precio" min='1' value="<?php
                        if ((old('precio') != null)) {
                            echo old('precio');
                        } else {
                            echo $tipo->precio;
                        }
                        ?>">


                        @if ($errors->has('precio'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('precio') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('duration') ? ' has-error' : '' }}">
                    <label for="Duración" class="col-md-4 col-sm-4 control-label">Duración Meses</label>

                    <div class="col-md-2 col-sm-2">
                        <input id="duration" type="number" class="form-control" name="duration" min='1' value="<?php
                        if ((old('duration') != null)) {
                            echo old('duration');
                        } else {
                            echo $tipo->duration;
                        }
                        ?>">

                        @if ($errors->has('fecha'))
                        <span class="help-block">
                            <strong><i>{{ $errors->first('duration') }}</i></strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <a href="{{url('admin/tipos')}}"class="btn btn-warning">Cancelar</a><span>  </span>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-check-circle-o"></i> Editar
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>      

<script src="{{ URL::asset('js/tipos.js')}}"></script>
@endsection
