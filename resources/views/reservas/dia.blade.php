@extends('reservas.reservas')
@section('contenido') 
<div id="lunes" class=" col-md-12 tab-panel active">
    <h3>{{ strtoupper($dia)}}</h3>


    @foreach ($clases as $clase)
    @if($clase->publicado)
    @php $valor=null;
    @endphp
    <div class="col-md-2 col-sm-6 claseReserva"> 
        @foreach ($reservar as $rese)   
        @foreach ($rese as $res)    
        @if ($res->id==$clase->id)
        @php $valor=$res->count;
        @endphp

        @endif
        @endforeach
        @endforeach    

        <p class="text-info text-right">Plazas libres: {{ (isset($valor)) ? $clase->limit-$valor : $clase->limit }}</p>

        <h3 class='text-center'>{{$clase->tipo->name}}</h3>
        <p class="text-center">{{ substr($clase->hora_ini, 0,5)}}<span> -> </span>{{substr($clase->hora_fin, 0,5)}}</p> 
        <p class='text-center text-capitalize'>{{$clase->profesor->name}}<span> </span>{{$clase->profesor->last_name }}</p> 
        <form class='formularioreserva' method='post'> 
            {{ csrf_field() }}
            <input name='userid' hidden type='number' value='{{Auth::id()}}'>
            <input name='claseid' hidden type='number' value='{{$clase->id}}'>

            @foreach ($reserva as $res)
       
            @if ($res->clase_id == $clase->id)                                 
            <?php $encontrado = true ?>                                                  

            @endif

            @endforeach

            @if ($hoy==$clase->dia && $hora > $clase->hora_ini-1)

            <button disabled class='btn btn-danger center-block'> Fuera de tiempo </button>

            @else
            @if (!isset($valor) or (isset($valor) && $clase->limit-$valor>0))

            @if(isset($encontrado))                         


            <button type='submit' name='cancelar' class='btnreserva anularreserva btn btn-warning center-block'> Cancelar </button>

            <?php $encontrado = null ?> 

            @else


            <button id='reservarclase' name='reservar'type=submit' class='btnreserva reservaclase btn btn-info center-block'> Reservar </button>



            @endif
            @else
            {{'<p>Clase completa</p>'}}

            @endif
            @endif

        </form>

    </div>
    @endif
    @endforeach
</div>
@endsection
