@extends ('admin.admin')
@section('contenido')
<link rel="stylesheet" href="{{URL::asset('css/imprimirreservas.css')}}"/>
<table class="display table table-striped table-hover" id="reservasusuarios-table">
    <h1 class="text-center">RESERVAS</h1>
<i>Está habilitada la búsqueda por Id Clase. Filtra tu búsqueda e imprime tu lista de usuarios para una clase</i>   
        <hr/>
        <thead>
        <tr>
            <th title="Ordenar">Id Clase</th>
            <th title="Ordenar">Dia</th>
             <th title="Ordenar">Inicio</th>
               <th title="Ordenar">Fin</th>   
            <th title="Ordenar">Id Usuario</th>
              <th title="Ordenar">Nombre Usuario</th>
              <th title="Ordenar">Apellido Usuario</th>
              <th title="Ordenar">Contacto</th>
            
        </tr>
    </thead>
</table>
<button class="btn btn-info btnimprimir glyphicon glyphicon-print"> Imprimir</button>
<script src="{{ URL::asset('js/clases.js')}}"></script>
@endsection
