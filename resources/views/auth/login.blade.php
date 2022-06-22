@extends('layouts.login')
@section('title','Iniciar Sesión')
@section('content')
<div class="content-overlay"></div>
    <div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="app-content content ">
            <div class="auth-wrapper auth-v2">
                <div class="auth-inner row m-0">
                    <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                        <div class="w-100 d-lg-flex align-items-center justify-content-center px-5">
                            <img class="img-fluid" src="{{secure_asset("assets/images/pages/login-v2.svg")}}" alt="Login V2"/>
                        </div>
                    </div>
                    <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                        <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                            <h2 class="card-title fw-bold mb-1">Bienvenido!</h2>
                            <form class="auth-login-form mt-2" method="POST" action="{{ secure_url('login') }}">
                                @csrf
                                <div class="mb-1">
                                    <label class="form-label" for="email">Correo Electrónico</label>
                                    <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" type="text" name="login-email"  autofocus="" tabindex="1"/>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Estas credenciales son incorrectas.</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="mb-1">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <a href="#"><small>Olvidaste la contraseña?</small></a>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input class="form-control form-control-merge @error('password') is-invalid @enderror" id="password" type="password" name="password" placeholder="············" aria-describedby="password" tabindex="2"/>
                                        <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="form-check">
                                    <input class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox" tabindex="3"/>
                                    <label class="form-check-label" for="remember">Recordarme</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100" type="submit" tabindex="4">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
