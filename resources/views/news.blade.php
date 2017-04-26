@extends('layouts.app')
@section('content')    
       <!-- Sección Noticias -->
    <section id="news" class="container content-section ">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                
                 @foreach ($noticia as $new)
                 <div >
                <h3>{{$new->title}}</h2>
           
            <i>Publicado el {{substr($new->created_at,0,10)}}</i><br/><br/>
            <div><img class="col-lg-5 col-md-5 col-sm-5 img-circle imgNoticia img-responsive" src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}"></div>
            <div><p class='white'><?php print ($new->content) ?></p></div>
            <hr/>
             </div>
            @endforeach

            <div class="text-center">
            <?php echo $noticia->render(); ?>
            </div>
               </div>
        </div>
    </section>
 
    @endsection
  