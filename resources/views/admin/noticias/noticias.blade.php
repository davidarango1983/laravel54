@extends ('admin.admin')
@section('contenido')
<table class="display table table-striped table-hover" id="noticias-table">
    <h1 class="text-center">Noticias</h1>
    <thead>
        <tr>
            <th title="Ordenar">Id</th>
            <th title="Ordenar">Titulo</th>
            <th title="Ordenar">Contenido</th>       
            <th title="Ordenar">Publicado</th>
                 <th title="Ordenar">Url Imagen</th>
            <th>Editar</th>
        </tr>
    </thead>
</table>
<script src="{{ URL::asset('js/noticias.js')}}"></script>
@endsection
