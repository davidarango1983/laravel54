
@extends('layouts.app')
@section('content')
<div class="container">
    <div id='divIzquierdo'class='col-xs-12 col-sm-3 col-lg-2'>
        <div class="panel panel-default">
            <div class="panel-body">
                @if (Auth::guest())
                <a href="/register">Inscríbete Ya!</a>
                @else
                <p> Hola! <strong>{{ Auth::user()->name}}</strong></p>
                <p>Echa un vistazo a las clases de hoy!</p>
                <a href="/reservaclases">
                    @foreach ($clases as $clase)
                    <strong>{{$clase->tipo->name}}</strong><br/>
                    <i>{{$clase->hora_ini}}</i></br>
                    <i>{{$clase->profesor->name}}</i>
                    <hr/>
                    @endforeach
                </a>
                @endif
                @if (!Auth::guest())
                <p>No olvides tus clases ya reservadas</p>
                @foreach ($reservas as $reserva)           
                <strong>{{strtoupper($reserva->clase->dia)}}</strong><br/><strong>{{substr($reserva->clase->hora_ini,0,5)}}</strong><br/>
                <hr/>
                @endforeach
                @endif
            </div>
        </div>

    </div>

    <div id='divCentral'class='col-xs-12 col-sm-9 col-lg-10'>


        @foreach ($noticia as $new)
        <div>
            <h2>{{$new->title}}</h2>
        </div>
        <i>Publicado el {{substr($new->created_at,0,10)}}</i><br/><br/>
        <div><img class='img-responsive col-xs-12' src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}"></div>
        <div><p><?php print ($new->content) ?></p></div>
        <hr/>
        @endforeach


        <?php echo $noticia->render(); ?>

    </div>






</div>


@endsection
