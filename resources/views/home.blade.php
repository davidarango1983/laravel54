
@extends('layouts.app')
@section('content')
<div class="container">
    <div class='row'>
   
    <div class="col-md-4 col-lg-3 col-sm-12 col-xs-12 visible-lg visible-md">
            <div class="sidebar-nav-fixed affix">
                <div class="well container-fuild">
                    
                @if (Auth::guest())
                <a href="/register">Inscríbete Ya!</a>
                @else
                <p> Hola! <strong>{{ Auth::user()->name}}</strong></p>
               
                <a href="/reservaclases"> <p>Echa un vistazo a las clases de hoy...</p>
                  
                </a>
                @endif
                @if (!Auth::guest())
                @if (count($reservas)>0)
                <p>No olvides tus clases ya reservadas</p>
                @endif                              
                @foreach ($reservas as $reserva)           
                <strong>{{strtoupper($reserva->clase->dia)}} </strong><a href='/reservaclases/{{$reserva->clase->dia}}'><strong>{{substr($reserva->clase->hora_ini,0,5)}}
                    </strong></a>
                 
                <hr/>
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
         
                <div class="well">
                    
                @if (Auth::guest())
                <a href="/register">Inscríbete Ya!</a>
                @else
                <p> Hola! <strong>{{ Auth::user()->name}}</strong></p>
               
                <a href="/reservaclases"> <p>Echa un vistazo a las clases de hoy...</p>
                  
                </a>
                @endif
                @if (!Auth::guest())
                @if (count($reservas)>0)
                <p>No olvides tus clases ya reservadas</p>
                @endif                              
                @foreach ($reservas as $reserva)           
                <strong>{{strtoupper($reserva->clase->dia)}} </strong><a href='/reservaclases/{{$reserva->clase->dia}}'><strong>{{substr($reserva->clase->hora_ini,0,5)}}
                    </strong></a>
                 
                <hr/>
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
        <div><img class='img-responsive col-xs-12' src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}"></div>
        <div><p><?php print ($new->content) ?></p></div>
        <hr/>
        @endforeach


        <?php echo $noticia->render(); ?>

    </div>





</div>
</div>


@endsection
