
@extends('layouts.app')
@section('content')
<!-- Intro Header -->
<!-- Intro Header -->
<header class="intro">
    <div class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="brand-heading">GYM<img class='logo' src="{{ URL::asset('/images/logogymtrans10.png')}}"></img>ZONE</h1>
                    <p class="intro-text">El gimnasio done cumplirás tus objetivos.
                        <br>¿A qué esperas?</p>
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
            <h2>GYMZONE <img class='logo' src="{{ URL::asset('/images/logogymtrans10.png')}}"></img> ZARAGOZA </h2>
            <p>Grayscale is a free Bootstrap 3 theme created by Start Bootstrap. It can be yours right now, simply download the template on <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
            <p>This theme features stock photos by <a href="http://gratisography.com/">Gratisography</a> along with a custom Google Maps skin courtesy of <a href="http://snazzymaps.com/">Snazzy Maps</a>.</p>
            <p>Grayscale includes full HTML, CSS, and custom JavaScript files along with LESS files for easy customization.</p>
        </div>
    </div>
</section>


<!-- Download Section -->
<section id="galery" class="content-section text-center">
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img width="800px" height="600px" src="/images/gym1.jpg" alt="Chania">
    </div>

    <div class="item">
      <img width="800px" height="600px" src="/images/gym2.jpg" alt="Chania">
    </div>

    <div class="item">
      <img width="800px" height="600px" src="/images/gym3.jpg" alt="Flower">
    </div>

    <div class="item">
      <img width="800px" height="600px" src="/images/gym4.jpg" alt="Flower">
    </div>
      <div class="item">
      <img width="800px" height="600px" src="/images/gym4.jpg" alt="Flower">
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


</section>




@endsection
