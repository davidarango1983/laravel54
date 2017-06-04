@extends('layouts.adminapp')
@section('content')
<table class="display table table-striped table-hover" id="clase-table">
    <h1 class="text-center">CLASES</h1>
    <thead>
        <tr>
            <th title="Ordenar">Id</th>
            <th title="Ordenar">Inicio</th>
            <th title="Ordenar">Fin</th>
            <th title="Ordenar">Día</th>
            <th title="Ordenar">Límite</th>
            <th title="Ordenar">Publicado</th>
            <th title="Ordenar">Profesor</th>
            <th title="Ordenar">Tipo</th>
            <th>Editar</th>
        </tr>
    </thead>
</table>
<div id='modalprofesor' class="modal fade" tabindex="-1" role="dialog"></div>
<script src="{{ URL::asset('js/clases.js')}}"></script>
@endsection
