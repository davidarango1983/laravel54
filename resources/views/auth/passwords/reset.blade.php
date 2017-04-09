@extends('home')
@section('content')
<header class="intro">
    <div class="intro-body">
        <div class="container">     
             
                                  <div class="login-card"><img src="{{ URL::asset('/images/logogym25.png') }}" class="profile-img-card">
            
               
<div class="panel-heading">Recuperar contraseña</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-signin" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          
                            <div class="">
                                <input id="password" type="password" class="form-control" placeholder="Contraseña" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                       
                            <div class="">
                                <input id="password-confirm" type="password" placeholder="Confirmar contraseña" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="">
                            <button class="btn btn-primary btn-block btn-lg col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" type="submit">Recuperar</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>>
@endsection
