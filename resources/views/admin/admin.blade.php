@extends('layouts.adminapp')
@section('content')
<div class="container-fluid">
   
    <div class="col-md-6">
        <div class="widget-small btn-primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Usuarios Inscritos</h4>
                <p> Inscritos <b>{{$users}}</b></p>
                <p> Activos <b>{{$activos}}</b></p>
                @php if($activos > 0){
                echo $percent=intval($activos/$users*100).'%';
                }else{ echo $percent=0;}
                @endphp
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{$percent}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percent}}">
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-small btn-danger"><i class="icon fa fa-edit fa-3x"></i>
            <div class="info">
                <h4>Noticias</h4>
                <p> Creadas <b>{{$noticias}}</b></p>
                <p> Publicadas <b>{{$notpub}}</b></p>
                @php if($notpub>0){
                echo $percentNot=intval($notpub/$noticias*100).'%';
                }else{ echo $percentNot=0;}
                @endphp
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{$percentNot}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentNot}}">
                  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="widget-small btn-info"><i class="icon fa fa-bicycle fa-3x"></i>
            <div class="info">
                <h4>Clases</h4>
                <p> Creadas <b>{{$clases}}</b></p>
                <p> Activas <b>{{$clasespub}}</b></p>
                @php if($clasespub>0){
                echo $percentcla=intval($clasespub/$clases*100).'%';
                }else{ echo $percentcla=0;}
                @endphp
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{$percentcla}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentcla}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-small btn-warning"><i class="icon fa fa-picture-o fa-3x"></i>
            <div class="info">
                <h4>Imágenes del Slider</h4>
                <p> Añadidas <b>{{$img}}</b></p>
                <p> Activas <b>{{$imgpub}}</b></p>
               @php if($imgpub>0){
                echo $percentimg=intval($imgpub/$img*100).'%';
                }else{ echo $percentimg=0;}
                @endphp
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="{{$percentimg}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$percentimg}}">
                     </div>
                </div>
            </div>
        </div>
    </div>
       
      <div class="col-md-6">
        
        <div class="widget-small btn-info"><i class="icon fa fa-id-card-o fa-3x"></i>
            <div class="info">
                <h4>Profesores</h4>
                @foreach ($prof as $profe)
                <p> {{$profe->name}} {{$profe->last_name}} </p>
                 @endforeach
                
            </div>
        </div>
      </div>
             <div class="col-md-6">
        <div class="widget-small btn-danger"><i class="icon fa fa-heartbeat fa-3x"></i>
            <div class="info">
                <h4>Actividades</h4>
                 @foreach ($act as $acti)
                <p> {{$acti->name}} </p>
                 @endforeach
              
            </div>
        </div>
    </div>
   
</div>
@endsection