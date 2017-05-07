<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">
            {{$usuario->name}}<span> </span>{{ $usuario->last_name}}
            </h4> </div>
        <div class="modal-body">
            <div id="perfil">
                
                <div class="">
                    <label>
                        <legend>Datos Personales</legend>
                        <p>Nombre : <span> {{ $usuario->name }}</span> </p>
                        <p>Apellidos : <span>{{ $usuario->last_name}}</span></p>
                        <p>Fecha de Nacimiento : <span>{{$usuario->fecha_nac}}</span> </p>
                    </label>
                </div>
                <div class="clear-fix"></div>
                <div class="">
                    <label>
                        <legend>Contacto</legend>
                        <p>Teléfono : <span>{{$usuario->telefono}} </span> </p>
                        <p>e-mail : <span></span>{{$usuario->email}} </p>
                    </label>
                </div>
            <div class="clear-fix"></div>
                <div class="">
                    <label>
                        <legend>Suscripción</legend>
                        <p>Suscripción : @if ($usuario->suscripcion->fecha_fin
                            < getdate()) <span class='alert-success'> Activa </span>
                        </p> @else <span class="alert-danger">Inactiva</span>
                        <button id='btnpagar' class="btn btn-info">Pagar Suscripción</button> @endif
                        <p>Fecha de inicio : <span>{{$usuario->suscripcion->fecha_ini}}</span></p>
                        <p>Fecha de finalización : <span>{{$usuario->suscripcion->fecha_fin}}</span></p>
                    </label>
                </div>
                
                <div class="">
                    <label>
                        <legend>Tipo de Suscripción</legend>
                        <p>Id: <span>{{$tipo->id}}</span></p>
                        <p>Nombre: <span>{{$tipo->name}}</span></p>
                        <p>Duración: <span>{{$tipo->duration}} meses</span></p>
                        <p>Precio: <span>{{$tipo->precio}}€</span></p>
                    </label>
                </div>
            </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
</div>