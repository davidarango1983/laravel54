@extends('layouts.app')
@section('content')

<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h2 class="brand-heading">GYM
                    </h2>
                    <img  alt="gymzonelogo" class='logo' src="{{ URL::asset('/images/logogymtrans10.png')}}"/>
                    <h2 class="brand-heading">ZONE</h2>
                    <p class="intro-text">El gimnasio done cumplirás tus objetivos.
                        <br/>¿A qué esperas?</p>
                    <div  style=margin-top:70px;>
                        @if(Session::has('flash_message'))
                        <div class="col-xs-12 text-center alert  alert-danger"><span></span><em> {!! session('flash_message') !!}</em></div>
                        @endif
                    </div>
                    <a href="#activities" class="btn btn-circle page-scroll">
                        <em class="fa fa-angle-double-down animated"></em>                          
                    </a>                         
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Activities Section -->
<section id="activities" class="content-section text-center">
    <h2 class="text-center">ACTIVIDADES</h2>
    @php $count=1;
    @endphp
    @if(isset($actividad))
    @foreach ($actividad as $act)


    <div class="col-sm-4

         @if($count==1){
             item active
             @else
             item
             @endif
             ">
             <h3>{{$act->name}}</h3>
             <div>
                 <p>{{$act->description}}</p>
             </div>
         </div>
         @php $count++;
         @endphp

         @endforeach
         @endif
    </section>

    <!-- About Section -->
    <section id="about" class=" content-section text-center">
        <h2 class="text-center">quiénes somos</h2>
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2>GYMZONE</h2>
                <img class='logo' alt="gymzone_logo" src="{{ URL::asset('/images/logogym10.png')}}"/>
                <h2>ZARAGOZA </h2>
                <p>Somos un gimnasio nuevo en la ciudad, innovador, con las mejores instalaciones y los mejores profesionales dispuestos a ayudarte.</p>
                <p>Tenemos un sinfín de actividades y las mejores instalaciones de la ciudad. ¿Qué estás esperando? </p>
                <p>Registrate ya <a href="/register">aquí</a></p>
                <p>¿Deseas más información?, ponte en contacto con nosotros por estos <a class="page-scroll" href="#contact">medios</a></p>
            </div>
        </div>
    </section>


    <!-- Galery Section -->
    <section id='galery' class="content-section">
        <h2 class="text-center">Galería</h2>
        <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @php $count=0;
                    @endphp
                    @if(isset($imagen))
                    @foreach ($imagen as $img)            
                    @if($img->publicado==1)            
                    <li data-target="#myCarousel" data-slide-to="{{$count}}" class=" 
                        @if ($count==1){{'active'}}
                        @endif
                        "></li>

                    @php $count++;
                    @endphp
                    @endif
                    @endforeach

                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @php $count=0;
                    @endphp
                    @foreach ($imagen as $img)

                    @if($img->publicado=1)

                    <div class="
                         @if ($count==0){{"item active"}}
                         @else{{"item"}}
                         @endif
                         ">
                        <img alt='{{$img->alt}}'  style="width:100%;" src="/images/{{$img->urlimg}}" title='{{$img->title}}'/>
                    </div>
                    @php $count++;
                    @endphp
                    @endif
                    @endforeach
                    @endif
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    @endsection
