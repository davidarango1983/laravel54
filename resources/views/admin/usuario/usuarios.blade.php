@extends('layouts.adminapp')
@section('content')
<script src="{{ URL::asset('js/usuarios.js')}}"></script>
<table class="display table table-striped table-hover" id="users-table">
    <h1 class="text-center">USUARIOS</h1>
    <thead>
        <tr>
            <th title="Ordenar">Id</th>
            <th title="Ordenar">Nombre</th>
            <th title="Ordenar">Apellidos</th>
            <th title="Ordenar">Telefono</th>
            <th title="Ordenar">e-mail</th>
            <th title="Ordenar">Fecha de Nacimiento</th>
            <th>Editar</th>
        </tr>
    </thead>
</table>
<div id='modalusuarios' class="modal fade" tabindex="-1" role="dialog"></div>
@endsection
