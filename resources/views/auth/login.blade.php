@extends('layouts.app')

@section('content')
    <style>
        .pad.u {
            box-shadow: 0 1px 0 #ffffff, 0 2px 0 #ffffff, 0 3px 0 #ffffff, 0 4px 0 #ffffff, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
        }
        .section-title {
            text-align: center;
        }

        .section-title h5 {
            font-size: 32px;
            font-weight: bold;
            text-transform: uppercase;
            padding-bottom: 20px;
            position: relative;
            color: #37517e;
        }

        .section-title h5::before {
            content: '';
            position: absolute;
            display: block;
            width: 120px;
            height: 1px;
            background: #ddd;
            bottom: 1px;
            left: calc(50% - 60px);
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            display: block;
            width: 40px;
            height: 3px;
            background: #47b2e4;
            bottom: 0;
            left: calc(50% - 20px);
        }
    </style>
    <div class="pad u">

        <div class="row" >
    <div class="col-md-6 text-center d-flex align-items-center" >

        <img src="{{asset('img/startup.jpg')}}"   width="100%" height="100%">
    </div>
    <div class="col-md-6 text-center d-flex align-items-center  login-box"  style="float: right">

        <!-- /.login-logo -->
            <div class="login-card-body" style=" width: 100%; height: 100%">
                <div class="section-title">
                    <h5>Authentification</h5>
                </div>
                <div class="login-logo">
                    <span> <br>Ecosysteme <b>Start-Up</b></span>
                </div>
                <p class="login-box-msg">Authentifier vous pour accéder à votre session</p>

                <form  action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" placeholder="Adresse E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="row" >
                        <div class="col-5">
                            <div class="icheck-primary">
                                <input  type="checkbox" name="remember" id="remember"  class="{{ old('remember') ? 'checked' : '' }}">
                                <label for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <!-- /.col -->
                        <div class="col-5" style="align-content: center">
                            <button type="submit" class="btn btn-primary btn-block" >
                               Connecter
                            </button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié?') }}
                        </a>
                    @endif
                </p>
                <p class="mb-1">
                    <a href="{{ route('register') }}" class="btn btn-link">Créer un compte</a>
                </p>
            </div>
            <!-- /.login-card-body -->
    </div>
        </div>
    </div>
@endsection
