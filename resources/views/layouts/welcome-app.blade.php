@extends('layouts.login-app')

@section('content')



<div id="page-container"> 

    <!-- Main Container -->
    <main id="main-container">

        <!-- Page Content -->
        <div class="bg-image" style="background-image: url('{{asset('media/photos/photo22@2x.jpg')}}');">
            <div class="row no-gutters bg-primary-op"> 
                <!-- Main Section -->
                <div class="hero-static col-md-6 d-flex align-items-center bg-white">
                    <div class="p-3 w-100">
                        <!-- Header -->
                        <div class="mb-3 text-center">
                            <a class="link-fx font-w700 font-size-h1" href="{{ url('/') }}">
                                <span class="text-dark">Adnexio</span><span class="text-primary">.com</span>
                            </a>
                            <p class="text-uppercase font-w700 font-size-sm text-muted">Sign In</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->

                        <!--<div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
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

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>-->

                        <div class="row no-gutters justify-content-center">
                            <div class="col-sm-8 col-xl-6">
                                <!--<form class="js-validation-signin" action="be_pages_auth_all.html" method="post">-->
                                <!--<form class="js-validation-signin" action="/be_pages_dashboard" method="POST">-->

                                <form class="js-validation-signin" action="{{ route('login') }}" method="POST">

                                @csrf

                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('warning'))
                                        <div class="alert alert-warning">
                                            <p>
                                                {{ $message }}
                                            </p>
                                        </div>
                                    @endif



                                    <div class="py-3">
                                        <div class="form-group">
                                            <!--<input type="email" class="form-control form-control-lg form-control-alt" id="email" name="login-username"  placeholder="Email">-->
                                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg form-control-alt" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                        <div class="form-group">
                                            <!--<input type="password" class="form-control form-control-lg form-control-alt" id="password" name="login-password" placeholder="Password">-->
                                            <input id="password" type="password" class="form-control form-control-lg form-control-alt" name="password" placeholder="Password" required>

                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-block btn-hero-lg btn-hero-primary">
                                            <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                        </button>
                                       
                                        <!--<p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a href="{{ url('/redirect') }}"><img src="https://www.freeiconspng.com/uploads/login-with-facebook-button-png-32.png" width="210" alt="login with facebook button png" /></a>


                                            <a href="{{ url('/gredirect') }}" ><img src="{!! asset('media/buttons/btn_google_signin_light_normal_web.png') !!}" /></a>
                                        </p>-->
                                       
                                         <p class="mt-2 mb-0 d-lg-flex justify-content-lg-between">
                                            <!--<a class="btn btn-sm btn-primary d-block d-lg-inline-block mb-1" href="{{ url('/redirect') }}">
                                                Login with Facebook
                                            </a>-->
                                            <a href="{{ url('/redirect') }}">
                                                <img src="{!! asset('assets/media/buttons/login_facebook_small.png') !!}" style="width: 160px; height:35px;" onmouseover="this.src='{!! asset('assets/media/buttons/login_facebook_small_normal.PNG') !!}';" onmouseout="this.src='{!! asset('assets/media/buttons/login_facebook_small.png') !!}';" >
                                            </a>
   
                                            <!--<a class="btn btn-sm btn-danger d-block d-lg-inline-block mb-1" href="{{ url('/gredirect') }}">
                                                Sign in with Google
                                            </a>-->
                                            <a href="{{ url('/gredirect') }}">
                                                <img src="{!! asset('assets/media/buttons/login_google_small.png') !!}" style="width: 160px; height:35px;" onmouseover="this.src='{!! asset('assets/media/buttons/btn_google_signin_dark_normal_web@2x.png') !!}';" onmouseout="this.src='{!! asset('assets/media/buttons/btn_google_signin_dark_pressed_web@2x.png') !!}';" >
                                            </a>
                                            
                                        </p>
                                       
                                        <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ url('/password/reset') }}">
                                                <i class="fa fa-exclamation-triangle text-muted mr-1"></i> Forgot password
                                            </a>
                                            <a class="btn btn-sm btn-light d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                                                <i class="fa fa-plus text-muted mr-1"></i> New Account
                                            </a>
                                        </p>

                                    </div>


                            </div>
                        </div>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Main Section -->

                <!-- Meta Info Section -->
                <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                    <div class="p-3">
                        <p class="display-4 font-w700 text-white mb-3">
                            The perfect job match
                        </p>
                        <p class="font-size-lg font-w600 text-white-75 mb-0">
                            Copyright &copy; <span class="js-year-copy">2018</span>
                        </p>
                    </div>
                </div>
                <!-- END Meta Info Section -->
            </div>
        </div>
        <!-- END Page Content -->

    </main>
    <!-- END Main Container -->
    
</div>

<!-- END Page Container -->


@endsection