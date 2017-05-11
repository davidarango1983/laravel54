
@extends('layouts.app')
@section('content')

 

<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1 class="brand-heading">GYM<img class='logo' src="{{ URL::asset('/images/logogymtrans10.png')}}"></img>ZONE</h1>
                    <p class="intro-text">El gimnasio done cumplirás tus objetivos.
                        <br>¿A qué esperas?</p>
                    <div  style=margin-top:70px;>
             @if(Session::has('flash_message'))
    <div class="col-xs-12 text-center alert  alert-danger"><span></span><em> {!! session('flash_message') !!}</em></div>
@endif

        </div>
                    <a href="#activities" class="btn btn-circle page-scroll">
                        <i class="fa fa-angle-double-down animated"></i>                          
                    </a>                         
                </div>
            </div>
        </div>
    </div>
</header>


<!-- ActivitiesSection -->
<section id="activities" class="content-section text-center">
    <div id="myCarouselact" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">


            @php $count=1;
            @endphp

            @foreach ($actividad as $act)


            <div class="col-sm-8 col-sm-offset-2
                 @if ($count==1){{'item active'}}
                 @else{{'item'}}
                 @endif
                 ">
                <h3><?php print ($act->name) ?></h3>
                <div>
                    <p><?php print ($act->description) ?></p>
                </div>
            </div>
            @php $count++;
            @endphp

            @endforeach


        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarouselact" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarouselact" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


</section>




<!-- About Section -->
<section id="about" class=" content-section text-center">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2>GYMZONE <img class='logo' src="{{ URL::asset('/images/logogymtrans10.png')}}"></img> ZARAGOZA </h2>
            <p>Somos un gimnasio nuevo en la ciudad, innovador, con las mejores instalaciones y los mejores profesionales dispuestos a ayudarte.</p>
            <p>Tenemos un sinfín de actividades y las mejores instalaciones de la ciudad. ¿Qué estás esperando? </p>
            <p>Registrate ya <a href="/register">aquí</a></p>
            <p>Y sí deseas más información, ponte en contacto con nosotros por estos <a class="page-scroll" href="#contact">medios</a></p>
        </div>
    </div>
</section>


<!-- Download Section -->
<section id='galery' class="content-section">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                @php $count=0;
                @endphp
                @foreach ($imagen as $img)            
                @if($img->publicado==1)            
                <li data-target="#myCarousel" data-slide-to="{{$count}}" class=" @if ($count==1){{' active'}}
                    @else
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
                     @if ($count==0){{'item active'}}
                     @else{{'item'}}
                     @endif
                     ">
                    <img alt='{{$img->alt}}'  style="width:100%;" src="/images/{{$img->urlimg}}" title='{{$img->title}}'>
                </div>
                @php $count++;
                @endphp
                @endif
                @endforeach
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
