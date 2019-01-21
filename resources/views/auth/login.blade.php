@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{asset('css/login.css')}}" type="text/css"/>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Logowanie') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Adres email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <a class="btn btn-link" id="passwdResetButton" href="{{ route('password.request') }}">
                                {{ __('Nie pamiętasz hasła?') }}
                            </a>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Zapamiętaj mnie') }}
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Zaloguj się') }}
                                    </button>

                                    <a href="/login/facebook">
                                        <button type="button" class="btn btn-fb" >
                                            <i class="fab fa-facebook-f pr-1" >   <span style="font-family: Raleway; padding-left: 2px;">  Zaloguj się </span></i>
                                        </button>
                                    </a>
                                    <a href="/login/google">
                                        <button type="button" class="btn btn-gplus" >
                                            <i class="fab fa-google-plus-g pr-1" ><span style="font-family: Raleway;"> Zaloguj się </span></i>
                                        </button>
                                    </a>
                                    <!--<a class="btn btn-primary" href="/login/facebook">
                                        <i class="icon-facebook">Facebook</i>

                                    </a>-->

                                    <!--<a class="btn btn-primary" href="/login/google">
                                        Google
                                    </a>-->




                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
