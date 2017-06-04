@extends('layouts.app')
@section('content')    
<!-- Sección Noticias -->
<section id="news" class="container content-section ">
    <div class="col-sm-10 col-sm-offset-1">
        @foreach ($noticia as $new)
        <div class="col-sm-12">
            <h3>{{$new->title}}</h3>
            <i>Publicado el {{substr($new->created_at,0,10)}}</i><br/><br/>
            <div><img class="col-sm-5 img-circle imgNoticia img-responsive" style="max-width: 
                      400px;"alt='gymzone' src="/images/{{$new->urlimg}}" alt="{{$new->urlimg}}">
                <br/></div>
            <div><p class='white'><?php print ($new->content) ?></p></div>
            <div class="col-sm-12"><hr/></div>  
        </div>
        @endforeach
        <div class="text-center">
            <?php echo $noticia->render(); ?>
        </div>
    </div>
</section>
@endsection
