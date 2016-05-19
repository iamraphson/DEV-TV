@extends('layouts.master')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ URL('/') }}">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Login
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <section class="registration">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="login-register-content">
                    <div class="row collapse borderBottom">
                        <div class="medium-6 large-centered medium-centered">
                            <div class="page-heading text-center">
                                <h3>User login</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer data-equalize-on="medium" id="test-eq">
                        <div class="large-4 large-offset-1 medium-6 columns">
                            <div class="social-login" data-equalizer-watch>
                                <h5 class="text-center">Login via Social Profile</h5>
                                <div class="social-login-btn facebook">
                                    <a href="{{ route('auth.facebook') }}"><i class="fa fa-facebook"></i>login via facebook</a>
                                </div>
                            </div>
                        </div>
                        <div class="large-2 medium-2 columns show-for-large">
                            <div class="middle-text text-center hide-for-small-only" data-equalizer-watch>
                                <p>
                                    <i class="fa fa-arrow-left arrow-left"></i>
                                    <span>OR</span>
                                    <i class="fa fa-arrow-right arrow-right"></i>
                                </p>
                            </div>
                        </div>
                        <div class="large-4 medium-6 columns end">
                            <div class="register-form">
                                <h5 class="text-center">Sign in to your account</h5>
                                <form method="post" data-abide novalidate>
                                    {{ csrf_field() }}
                                    @if(session()->has('error'))
                                    <div data-abide-error class="alert callout">
                                        <p><i class="fa fa-exclamation-triangle"></i> {{ session()->get('error') }} </p>
                                    </div>
                                    @endif
                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-user"></i></span>
                                        <input class="input-group-field {{ $errors->has('username') ? 'is-invalid-input' : '' }}" name="username" id="username" type="text" placeholder="Enter your username" required>
                                        <span class="form-error">username is required</span>
                                        @if ($errors->has('username'))
                                            <span class="form-error is-visible">username is required</span>
                                        @endif

                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                        <input type="password" id="password" name="password" placeholder="Enter your password"
                                               class="{{ $errors->has('password') ? 'is-invalid-input' : '' }}" required>
                                        <span class="form-error">password is required</span>
                                        @if ($errors->has('password'))
                                            <span class="form-error is-visible">password is required</span>
                                        @endif
                                    </div>
                                    <div class="checkbox">
                                        <input id="remember" type="checkbox" name="remember" id="remember" value="remember">
                                        <label class="customLabel" for="remember">Remember me</label>
                                    </div>
                                    <button class="button expanded" type="submit" name="submit">login Now</button>
                                    <p class="loginclick"><a href="{{ url('/password/reset') }}">Forgot Password</a> New Here? <a href="{{ url('/register') }}">Create a new Account</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
