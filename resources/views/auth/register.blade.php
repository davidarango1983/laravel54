@extends('layouts.app')

@section('content')
<header class="intro">
    <div class="intro-body">
        <div class="container" id='containerregister'>
   <div class="login-card"><img src="{{ URL::asset('/images/logogym25.png') }}" class="profile-img-card">
        <p class="profile-name-card"> </p>
                    <form class="form-signin" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                          

                            <div class="">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Nombre"value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('name') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                          
                            <div class="">
                                <input id="name" type="text" class="form-control" name="apellido" placeholder="Apellido"value="{{ old('apellido') }}">

                                @if ($errors->has('apellido'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('apellido') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                           
                            <div class="">
                                <input id="fecha" type="text" class="form-control picker-input" data-lang="es" name="fecha" placeholder="Fecha Nac" title='Fecha Nac.'value="{{ old('fecha') }}">

                                @if ($errors->has('fecha'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('fecha') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                           
                            <div class="">
                                <input id="telefono" type="tel" class="form-control" placeholder="Teléfono" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('telefono') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('email') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           
                            <div class="">
                                <select id="suscripcion" class="form-control" name="suscripcion">
                                
                                    @foreach ($datos as $suscripcion)
                                    <option value="{{$suscripcion['id']}}">{{$suscripcion['name']}} {{$suscripcion['precio']}} €</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('suscripcion'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('suscripcion') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           
                            <div class="">
                                <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password">

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('password') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                         
                            <div class="">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Repetir contraseña" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong><i>{{ $errors->first('password_confirmation') }}</i></strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3">
                                    <i class="fa fa-btn fa-user"></i> Registrar
                                </button>
                            </div>
                        </div>
                         <a href="{{ url('/password/reset') }}" class="forgot-password">Has olvidado tu contraseña?</a></div>
                    </form>
                </div>
            </div>
        
       
        
    
</div>

        </div>
    </div>
</div>
</header>
@endsection



