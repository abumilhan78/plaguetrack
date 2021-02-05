@extends('layouts.app')
@push('css')
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="{{asset("assets/login/images/icons/favicon.ico")}}"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/bootstrap/css/bootstrap.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/animate/animate.css")}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/css-hamburgers/hamburgers.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/animsition/css/animsition.min.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/select2/select2.min.css")}}">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/vendor/daterangepicker/daterangepicker.css")}}">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/css/util.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/login/css/main.css")}}">
<!--===============================================================================================-->
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            <div class="limiter">
                <div class="container">
                    <div class="wrap-login100 shadow">
                        <div class="login100-form-title" style="background-image: url({{asset("assets/login/images/bg-01.jpg")}});">
                            <span class="login100-form-title-1">
                                Sign In
                            </span>
                        </div>

                        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                                <span class="label-input100">{{ __('E-Mail Address') }}</span>
                                <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                                <span class="label-input100">{{ __('Password') }}</span>
                                <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter password">
                                <span class="focus-input100"></span>
                            </div>

                            <div class="flex-sb-m w-full p-b-30">
                                <div class="contact100-form-checkbox form-check">
                                    <input class="form-check-input input-checkbox100" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label label-checkbox100" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                                <div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link txt1" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="container justify-content-center">
                                <button class="login100-form-btn ">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- Limiter --}}
        </div>
    </div>
</div>
@endsection

@push('script')
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/jquery/jquery-3.2.1.min.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/animsition/js/animsition.min.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/bootstrap/js/popper.js")}}"></script>
    <script src="{{asset("assets/login/vendor/bootstrap/js/bootstrap.min.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/select2/select2.min.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/daterangepicker/moment.min.js")}}"></script>
    <script src="{{asset("assets/login/vendor/daterangepicker/daterangepicker.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/vendor/countdowntime/countdowntime.js")}}"></script>
<!--===============================================================================================-->
    <script src="{{asset("assets/login/js/main.js")}}"></script>
@endpush
