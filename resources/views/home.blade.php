@extends('layouts.app')
@section('content')

@yield('content')
    <!-- CABECERA -->
    <header class="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">GYMZONE</h1>
                        <p class="intro-text">El Gimnasio donde cumplirás tus objetivos.
                            <br>¿Empezamos?</p>
                        <a href="#about" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>GYM ZONE ZARAGOZA</h2>
                <p>Tenemos las mejores instalaciones de la ciudad y equipos de última generación. Además hemos incorporadado a los mejores profesionales para que alcances tus objetivos en un tiempo record</p>
                <p>Nunca un gimnasio te había dado tanto por tan poco</p>
                <p>¿A qué estás esperando? <a href='/register'>Regístrate ya</a></p>
            </div>
        </div>
    </section>
    
    
    
      <!-- Sección actividades -->
    <section id="jobs" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>UN SINFÍN DE CLASES! </h2>
                <p>Spinning</p> 
                <p>Yoga</p>
                <p>Step</p>
                <p>Zumba</p>
                
               
            </div>
        </div>
    </section>

    <!-- Download Section -->
    <section id="galery" class="content-section text-center">
       <div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
          <img src="images/gym1.jpg" class="image img-responsive" width="600" height="400">
      </div>

      <div class="item">
        <img src="images/gym2.jpg" class="image img-responsive" width="600" height="400">
      </div>
    
      <div class="item">
        <img src="images/gym3.jpg" class="image img-responsive" width="600" height="400">
      </div>

      <div class="item">
        <img src="images/gym4.jpg" class="image img-responsive" width="600" height="400">
      </div>
         <div class="item">
        <img src="images/gym5.jpg" class="image img-responsive" width="600" height="400">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
    </section>

    @endsection