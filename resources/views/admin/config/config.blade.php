@extends('layouts.adminapp')
@section('content')

<div class="container"> 
    <h1 class="text-uppercase">Configuración General</h1>

    <form>
        
        <input name='registro' type="checkbox"><label> Permitir el registro de nuevos usuarios</label></br>
        <input name='clases' type="checkbox"><label> Permitir ela reserva de clases</label></br>
        <input name='correos' type="checkbox"><label> Activar el envío de correos a los usuarios</label></br>
        <input name='noticias' type="checkbox"><label> Permitir la lectura de noticias</label></br>
        <input name='horaclase' type="number" min="0" max="24"><label> Estipular tiempo mínimo para hacer una reserva <span>Entre 0 y 24 horas</span></label></br>
       <br/>
       <input class="btn btn-info"type='submit' value='Actualizar'/>
        
        
    </form>
</div>
@endsection
