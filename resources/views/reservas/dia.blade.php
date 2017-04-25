@extends('reservas.reservas')
@section('contenido') 
<div id="lunes" class="  tab-panel active">
    <h3>{{strtoupper($day)}}</h3>

    @foreach ($clases as $clase)
    @if($clase->publicado)
    @php $valor=null;   
    @endphp


    <div>
        <div class="col-md-4 col-sm-4 center-block divRes "> 
            @foreach ($reservar as $rese)   
            @foreach ($rese as $res)    
            @if ($res->id==$clase->id)
            @php $valor=$res->count;
            @endphp
            @endif
            @endforeach
            @endforeach            

            <h6 class="text-center">Plazas libres: {{ (isset($valor)) ? $clase->limit-$valor : $clase->limit }}</h6>
            <h3 class='text-center'>{{$clase->tipo->name}}</h3>
            <h5 class="text-center">{{ substr($clase->hora_ini, 0,5)}}<span> - </span>{{substr($clase->hora_fin, 0,5)}}</h5> 
            <p class='h4 text-center text-capitalize'>{{$clase->profesor->name}}<span> </span>{{$clase->profesor->last_name }}</p> 
            <form class='formularioreserva' method='post'> 
                {{ csrf_field() }}
                <input name='userid' hidden type='number' value='{{Auth::id()}}'>
                <input name='claseid' hidden type='number' value='{{$clase->id}}'>

                @foreach ($reserva as $res)

               <?php if($res->clase_id == $clase->id) $encontrado = true ;  ?>                                 
                 
                

                @endforeach
                @if (!$puedeReservar)
                
                 <button disabled class='btn btn-danger center-block'> Renueva tu suscripción </button>
                @else
                @if ($hoy==$clase->dia && $hora > $clase->hora_ini-1)

                <button disabled class='btn btn-danger center-block'> Fuera de tiempo </button>

                @else
                @if (!isset($valor) or (isset($valor) && $clase->limit-$valor>0))

                @if(isset($encontrado)) 
                <button type='submit' name='cancelar' class='btnreserva anularreserva btn btn-warning center-block'> Cancelar </button>
                <?php $encontrado = null ?> 
                @else
                <button id='reservarclase' name='reservar'type=submit' class='btnreserva reservaclase btn btn-default center-block'> Reservar </button>
                @endif
                @else
                {{'<p>Clase completa</p>'}}

                @endif
                @endif
                @endif

            </form>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection
