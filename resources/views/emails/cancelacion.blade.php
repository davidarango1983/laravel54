@extends('emails.template')
@section('content')
<p> Hola {{ $user->name}} !!<p>
<p>Lamentamos informarte que tu clase de {{$clase->tipo->name}} prevista para el día {{$clase->dia}} a las {{$clase->hora_ini}} horas </p>
<p>ha sido cancelada.</p>
<p>Esperamos que nos disculpes y te recordamos que hay un montón de actividades que puedes hacer en nuestro centro</p>
  @endsection