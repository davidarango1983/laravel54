@extends('layouts.adminapp')
@section('content')
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

<script src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>
<script src="{{ URL::asset('js/clases.js')}}"></script>

@endsection
