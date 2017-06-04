@extends('emails.template')
@section('content')
       <p> Hola {{ $user->name}} !!<p>
<p>Queremos informarte que tu clase de {{$clase->tipo->name}}  ha sufrido algunos cambios.
    
<p>Día: {{$clase->dia}} a las {{$clase->hora_ini}} horas con el profesor {{$clase->profesor->name}} {{$clase->profesor->last_name}}</p>

<p>Esperamos que nos disculpes y te recordamos que hay un montón de actividades que puedes hacer en nuestro centro</p>
      </body>
</html>

@endsection