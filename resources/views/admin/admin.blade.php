@extends('layouts.adminapp')
@section('content')
<div class="container-fluid">

    <div class="col-md-6">
        <div class="widget-small btn-primary"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
                <h4>Usuarios Inscritos</h4>
                <p> Inscritos <b>200</b></p>
                <p> Activos <b>130</b></p>
                {{130/200*100}}%
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                        <span class="sr-only">65% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-small btn-danger"><i class="icon fa fa-edit fa-3x"></i>
            <div class="info">
                <h4>Noticias</h4>
                <p> Creadas <b>20</b></p>
                <p> Publicadas <b>19</b></p>
                {{19/20*100}}%
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                        <span class="sr-only">95% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">

        <div class="widget-small btn-info"><i class="icon fa fa-bicycle fa-3x"></i>
            <div class="info">
                <h4>Clases</h4>
                <p> Creadas <b>20</b></p>
                <p> Activas <b>19</b></p>
                {{19/20*100}}%
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                        <span class="sr-only">95% Complete</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-small btn-warning"><i class="icon fa fa-comments-o fa-3x"></i>
            <div class="info">
                <h4>Imágenes del Slider</h4>
                <p> Añadidas <b>20</b></p>
                <p> Activas <b>19</b></p>
                {{19/20*100}}%
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 55%">
                        <span class="sr-only">95% Complete</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
      <div class="col-md-6">
        
        <div class="widget-small btn-info"><i class="icon fa fa-id-card-o fa-3x"></i>
            <div class="info">
                <h4>Profesores</h4>
                <p> Profesor 1 </p>
                  <p> Profesor 2</p>
                    <p> Profesor 3</p>
                
            </div>
        </div>
      </div>
             <div class="col-md-6">
        <div class="widget-small  primary"><i class="icon fa fa-comments-o fa-3x"></i>
            <div class="info">
                <h4>Actividades</h4>
                <p> Actividad 1</p>
                <p> Actividad 2</p>
                <p> Actividad 3</p>
              
            </div>
        </div>
    </div>
   
</div>




@endsection