@extends('layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/backend/css/pages/login.css')}}" />
    <link href="{{asset('/backend/css/bootstrap.min.css')}}" rel="stylesheet" />
@endpush

@section('content')
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
            <div id="container_demo">
{{--
                <a class="hiddenanchor" id="toregister"></a>
--}}
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toforgot"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                            @csrf
                            <h3 class="black_bg">
                                <img src="{{asset('img/logo.png')}}" alt="logo">
                                <br>Log In</h3>
                            <div class="form-group ">
                                <label style="margin-bottom:0;" for="email1" class="uname control-label"> <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i> {{ __('E-Mail Address') }}
                                </label>
                                <input class="{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus/>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <div class="col-sm-12">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label style="margin-bottom:0;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i> {{ __('Password') }}
                                </label>
                                <input type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Enter a password" required/>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <div class="col-sm-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="checkbox" name="remember-me" id="remember-me" value="remember-me" class="square-blue" {{ old('remember') ? 'checked' : '' }} /> {{ __('Remember Me') }}
                                </label>
                            </div>
                            <p class="login">
                                <input type="submit" value="{{ __('Login') }}" class="btn btn-success" />
                            </p>
                            <p class="change_link">
                                <a href="#toforgot" class="btn btn-responsive botton-alignment btn-warning btn-sm">Forgot password
                                </a>
                                <a href="#toregister" id="signup" class="btn btn-responsive botton-alignment btn-success btn-sm pull-right">Sign Up

                                </a>
                            </p>
                        </form>
                    </div>

                    {{--<div id="forgot" class="animate form">
                        <form action="index.html" id="reset_pw" autocomplete="on" method="post">
                            <h3 class="black_bg">
                                <img src="img/logo.png" alt="josh logo">
                                <br>FORGOT PASSWORD</h3>
                            <p>
                                Enter your email address below and we'll send a special reset password link to your inbox.
                            </p>
                            <div class="form-group">
                                <label style="margin-bottom:0;" for="username2" class="youmai">
                                    <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i> Your email
                                </label>
                                <input id="username2" name="username2" placeholder="your@mail.com" />
                            </div>
                            <p class="login  reset_button">
                                <input type="submit" value="Reset Password" class="btn btn-raised btn-success btn-block" />
                            </p>
                            <p class="change_link">
                                <a href="#tologin" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm to_register">Back
                                </a>
                            </p>
                        </form>
                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script src="{{asset('/backend/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/vendors/iCheck/js/icheck.js')}}" type="text/javascript"></script>
    <script src="{{asset('/backend/js/pages/login.js')}}" type="text/javascript"></script>
@endpush
