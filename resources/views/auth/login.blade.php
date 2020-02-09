@extends('layouts.app')

@section('content')
<div class="container gradientBackground">
    <div class="row justify-content-center">
        <div class="col-md-8 innerGradientBackground">
            <div class="card kaigloCard">
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <div class="card-body">
                    <center><img src="{{asset('resources/muli-logo.png')}}"><br>
                    <span class="coyName">ObinnaPro Company</span></center>
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                        
                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" placeholder="Enter your email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                           
                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" placeholder="Enter password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <div class="col-md-12" style="text-align:right">
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <button id="submitBtn" type="submit" disabled="disabled" class="btn btn-primary kaigloBtn loginBtn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary plainBtn">
                                           <img src="{{asset('resources/google_icon.png')}}"> {{ __('Login with Google') }}
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary plainBtn">
                                        <img src="{{asset('resources/fb.png')}}"> {{ __('Login with Facebook') }}
                                        </button>
                                    </div>
                                </dic>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
        <center><span style="font-size:10px; text-align:center; color:#fff;margin:2em 0em">Don't have an account? <a href="{{url('/register')}}" style="color:#fff">Sign up> </a></span></center>
    </div>
    <div class="col-md-8">
        <p style="text-align:center; font-size:12px; margin-top:4em; color:#fff">&copy; Copyright protect 2019 .. This file cannot be shared....Design by @Philip Afemikhe</p>
    </div>
</div>

<!-- <script type='text/javascript' src='http://code.jquery.com/jquery.min.js'></script> -->

<script type='text/javascript'>
    $(function () {
        $('#password').keyup(function () {
            if ($(this).val() == '') {
                $('.loginBtn').prop('disabled', true);
            } else {
                $('.loginBtn').prop('disabled', false);
            }
        });
    });
</script>


@endsection
