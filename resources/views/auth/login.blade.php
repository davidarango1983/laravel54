@extends('home')
@section('content')
<header class="intro">
    <div class="intro-body">
        <div class="container">       
                                  <div class="login-card"><img src="{{ URL::asset('/images/logogym25.png') }}" class="profile-img-card">
                        <p class="profile-name-card"> </p>

                        <form class="form-signin" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}
                            <input class="form-control" type="email" required placeholder="Email" autofocus="" id="inputEmail" name="email" value="{{ old('email') }}" autofocus>
                
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                            <input class="form-control" type="password" required="" placeholder="Password" id="inputPassword"  name="password" required>
                      
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                            <button class="btn btn-primary btn-block btn-lg col-lg-offset-3 col-md-offset-3 col-sm-offset-3 col-xs-offset-3" type="submit">Identificarse</button>
                        </form><a href="{{ url('/password/reset') }}" class="forgot-password">Has olvidado tu contraseña?</a></div>
         
        </div>
    </div>
</header>

@endsection
