@extends ('admin.admin')
@section('contenido')

<table class="display table table-striped table-hover" id="tipos-table">
    <h1 class="text-center">TIPOS DE SUSCRIPCIÓN</h1>
    <thead>
        <tr>
            <th title="Ordenar">Id</th>
            <th title="Ordenar">Nombre</th>
            <th title="Ordenar">Precio en €</th>
            <th title="Ordenar">Duración en Meses</th>
            <th>Editar</th>
        </tr>
    </thead>
</table>

<script src="{{ URL::asset('js/tipos.js')}}"></script>
@endsection
