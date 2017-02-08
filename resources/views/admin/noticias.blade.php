@extends ('admin.admin')
@section('contenido')


<table class="display table table-striped table-hover" id="users-table">
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
<script src="{{ URL::asset('js/profesores.js')}}"></script>
@endsection
