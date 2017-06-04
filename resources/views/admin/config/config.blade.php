@extends('layouts.adminapp')
@section('content')
<div class="container"> 
    <h1 class="text-uppercase">Configuración General</h1>

    <form class="form-horizontal" role="form" method="POST" action="{{url('admin/updateconfig')}}">
        {{ csrf_field() }}
        <input name='disable_records' {{$disableRecords}} type="checkbox"/><label> No permitir el registro de nuevos usuarios</label></br>
        <input name='disable_reservations' {{$disableReservations}} type="checkbox"/><label> No permitir la reserva de clases</label></br>
        <input name='disable_mails' {{$disableMails}} type="checkbox"/><label> Desactivar el envío de correos a los usuarios cuando se modifica una clase</label></br>
        <input name='disable_news'  {{$disableNews}} type="checkbox"/><label> No permitir la lectura de noticias</label></br>
        <input name='booking_time' type="number" min="0" max="24" value="{{$bookingTime}}"/><label> Estipular tiempo mínimo para hacer una reserva <span>Entre 0 y 24 horas</span></label></br>
        <br/>
        <input class="btn btn-info"type='submit' value='Actualizar'/>
    </form>
</div>
@endsection
