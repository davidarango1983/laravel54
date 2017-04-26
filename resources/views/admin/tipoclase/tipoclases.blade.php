@extends ('admin.admin')
@section('contenido')
<table class="display table table-striped table-hover" id="tipoclase-table">
    <h1 class="text-center">TIPOS DE CLASES</h1>
    <thead>
        <tr>
            <th title="Ordenar">Id</th>
            <th title="Ordenar">Nombre</th>
            <th title="Ordenar">Descripción</th>
          
            <th>Editar</th>
        </tr>
    </thead>
</table>
<div id='modalprofesor' class="modal fade" tabindex="-1" role="dialog"></div>

<script src="{{ URL::asset('js/clases.js')}}"></script>
@endsection
