<head>
<meta charset="utf-8">
    <link rel="icon"  type="image/png" href="{{asset('img/logiun.png')}}">	
    <title>Registro</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombres ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer" class="footer">
    <br>
        <div id="Fot">
            <div id="autores">
                <p>© 2020 Copyright:</br> Omar Daniel ortiz Delgado - Juan Felipe Garcia Peña</p>
            </div>
            <div id="redes">
                <h1>SÍGUENOS EN</h1>
                <a href="https://www.facebook.com/colagro.colagro" target="blank"><img src="{{asset('img/facebook.png')}}" width="20" height="20"></a>
                <a href="https://twitter.com/colagro1" target="blank"><img src="{{asset('img/twitter.png')}}" width="20" height="20"></a>
                <a href="https://www.youtube.com/channel/UCX3ZMMQf7MlUTgbyBDpEkPw/?guided_help_flow=5" target="blank"><img src="{{asset('img/youtube.png')}}" width="20" height="20"></a>
                <a href="https://www.linkedin.com/in/colagro-colagro-584696197/" target="blank"><img src="{{asset('img/linked.png')}}" width="20" height="20"></a>
            </div>
        </div>
    </div>
@endsection
