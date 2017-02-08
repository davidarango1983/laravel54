@extends('layouts.app')
@section('content')



<link rel="stylesheet" href="{{URL::asset('js/Growl/css/growl.css')}}"/>



<div id='paneladmin'>

    <div class="col-md-10 col-lg-offset-1">
        <div class="panel panel-default">


            <div class="panel-heading">ZONA ADMINISTRATIVA</div>

            <div class="panel-body">
                <nav class="navbar navbar-default navbar-static-top">
                    <div class=>
                        <div class="navbar-header">

                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#admin">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>


                        <div id='admin' class="container-fluid ">
                            <ul class="nav navbar-nav">
                                <li id='ususarios'  ><a data-toggle="pill" href="#users" id='usuarios'>Usuarios</a></li>
                                <li><a data-toggle="pill" href="#menu1">Profesores</a></li>
                                <li><a data-toggle="pill" href="#menu2">Clases</a></li>
                                <li><a data-toggle="pill" href="#menu3">Noticias</a></li>
                                <li><a data-toggle="pill" href="#menu1">Imágenes</a></li>
                                <li><a data-toggle="pill" href="#menu2">General</a></li>
                                <li><a data-toggle="pill" href="#menu3">Noticias</a></li>

                            </ul>

                            <div class="tab-content col-lg-12 col-md-12">
                                <div id="users" class="tab-pane fade">
                                                                <div class='col-md-12'>

                                        <div class="container col-md-12 col-sm-12 col-xs-12">
                                            <hr/>
                                            <table class="display table table-striped table-hover" id="users-table">
                                                <thead>
                                                    <tr>
                                                        <th title="Ordenar">Id</th>
                                                        <th title="Ordenar">Nombre</th>
                                                        <th title="Ordenar">Apellidos</th>
                                                        <th title="Ordenar">Telefono</th>
                                                        <th title="Ordenar">e-mail</th>
                                                        <th title="Ordenar">Fecha de Nacimiento</th>
                                                        <th>Editar</th>
                                                    </tr>
                                                </thead>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h3>Menu XXXXXXXXXX</h3>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>Menu xswsa2</h3>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                </div>
                                <div id="menu3" class="tab-pane fade">
                                    <h3>Menu 3</h3>
                                    <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                </div>
                            </div>
                        </div>
                </nav>

            </div>
        </div>
    </div>

       
  <div id='modalusuarios' class="modal fade" tabindex="-1" role="dialog"></div>      


</div>

</div>


<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- App scripts -->
<script src="{{ URL::asset('js/admin.js')}}"></script>
<script src="{{URL::asset('js/Growl/js/growl.js')}}"></script>

@endsection
