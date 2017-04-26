
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
   <div id="myCarouselact" class="carousel slide white" data-ride="carousel">
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
 

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    
           
     @php $count=1;
            @endphp
            @foreach ($imagen as $img)
            
            @if($img->publicado=1)
            
            <div class="
                @if ($count==1){{'item active'}}
                @else{{'item'}}
                @endif
                ">
                <img alt='{{$img->alt}}'width="800px" height="600px" src="/images/{{$img->urlimg}}" title='{{$img->title}}'>
            </div>
            @php $count++;
          @endphp
          @endif
            @endforeach
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
