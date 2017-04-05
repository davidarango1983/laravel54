@extends('layouts.app2')
@section('content')    
       <!-- Sección Noticias -->
    <section id="news" class="container content-section ">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                
                 @foreach ($noticia as $new)
            <div>
                <h3>{{$new->title}}</h2>
            </div>
            <i>Publicado el {{substr($new->created_at,0,10)}}</i><br/><br/>
            <div><img class="col-lg-5 col-md-5 col-sm-5 img-circle imgNoticia img-responsive" src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}"></div>
            <div><p><?php print ($new->content) ?></p></div>
            <hr/>
            @endforeach


            <?php echo $noticia->render(); ?></div>
        </div>
    </section>
 
    @endsection
  