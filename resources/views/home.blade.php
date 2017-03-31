
@extends('layouts.app')
@section('content')
<div class="container">
    <div class='row'>

        <div  class="col-md-4 col-lg-3 col-sm-12 col-xs-12 visible-lg visible-md">
            <div class="sidebar-nav-fixed affix">
                <div id='divIzq' class="well container-fuild">

                    @if (Auth::guest())
                    <a href="/register">Inscríbete Ya!</a>
                    @else
                    <p> Hola! <strong>{{ Auth::user()->name}}</strong></p>               

                    </a>
                    @endif
                    @if (!Auth::guest())
                    @if (count($reservas)>0)
                    <p>Tus Reservas...</p>
                    @endif                              
                    @foreach ($reservas as $reserva)           
                    <strong>{{strtoupper($reserva->clase->dia)}} </strong><a href='/reservaclases/{{$reserva->clase->dia}}'><strong>{{substr($reserva->clase->hora_ini,0,5)}}
                        </strong></a>                 
                    <hr/>
                    @endforeach               
                    <p>Clases para hoy...</p>
                    @foreach ($clases as $clase)
                    <hr/>
                    <strong>{{strtoupper($clase->tipo->name)}} </strong><a href='/reservaclases/{{$clase->dia}}'><strong>{{substr($clase->hora_ini,0,5)}}</strong></a> con   <strong>{{strtoupper($clase->profesor->name.' '.$clase->profesor->last_name)}} </strong>

                    @endforeach
                    <hr/>
                    <p>Y mañana...</p>
                    @foreach ($clasesM as $clase)
                    <hr/>
                    <strong>{{strtoupper($clase->tipo->name)}} </strong><a href='/reservaclases/{{$clase->dia}}'><strong>{{substr($clase->hora_ini,0,5)}}</strong></a> con   <strong>{{strtoupper($clase->profesor->name.' '.$clase->profesor->last_name)}} </strong>

                    @endforeach
                    @endif
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>
        <!--/span-->
        <div>
            <div class="col-xs-12 col-sm-12 visible-xs visible-sm">

               <div id='divIzq' class="well container-fuild">

                    @if (Auth::guest())
                    <a href="/register">Inscríbete Ya!</a>
                    @else
                    <p> Hola! <strong>{{ Auth::user()->name}}</strong></p>               

                    </a>
                    @endif
                    @if (!Auth::guest())
                    @if (count($reservas)>0)
                    <p>Tus Reservas...</p>
                    @endif                              
                    @foreach ($reservas as $reserva)           
                    <strong>{{strtoupper($reserva->clase->dia)}} </strong><a href='/reservaclases/{{$reserva->clase->dia}}'><strong>{{substr($reserva->clase->hora_ini,0,5)}}
                        </strong></a>                 
                    <hr/>
                    @endforeach               
                    <p>Clases para hoy...</p>
                    @foreach ($clases as $clase)
                    <hr/>
                    <strong>{{strtoupper($clase->tipo->name)}} </strong><a href='/reservaclases/{{$clase->dia}}'><strong>{{substr($clase->hora_ini,0,5)}}</strong></a> con   <strong>{{strtoupper($clase->profesor->name.' '.$clase->profesor->last_name)}} </strong>

                    @endforeach
                    <hr/>
                    <p>Y mañana...</p>
                    @foreach ($clasesM as $clase)
                    <hr/>
                    <strong>{{strtoupper($clase->tipo->name)}} </strong><a href='/reservaclases/{{$clase->dia}}'><strong>{{substr($clase->hora_ini,0,5)}}</strong></a> con   <strong>{{strtoupper($clase->profesor->name.' '.$clase->profesor->last_name)}} </strong>

                    @endforeach
                    @endif
                </div>
                <!--/.well -->
            </div>
            <!--/sidebar-nav-fixed -->
        </div>

        <div id='divCentral'class='col-xs-12 col-sm-12 col-lg-9 col-md-8'>



            @foreach ($noticia as $new)
            <div>
                <h2>{{$new->title}}</h2>
            </div>
            <i>Publicado el {{substr($new->created_at,0,10)}}</i><br/><br/>
            <div><img class="col-lg-5 col-md-5 col-sm-5 img-circle imgNoticia img-responsive" src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}"></div>
            <div><p><?php print ($new->content) ?></p></div>
            <hr/>
            @endforeach


            <?php echo $noticia->render(); ?>

        </div>





    </div>
</div>


@endsection
