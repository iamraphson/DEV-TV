@extends('layouts.master')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="{{ url('/') }}">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Register
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
                                <h3>User Registeration</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer="ed32u5-equalizer" data-equalize-on="medium" id="test-eq" data-resize="0slrwn-eq" data-events="resize">
                        <div class="large-4 large-offset-1 medium-6 columns">
                            <div class="social-login" data-equalizer-watch="" style="min-height: 314px;">
                                <h5 class="text-center">Login via Social Profile</h5>
                                <div class="social-login-btn facebook">
                                    <a href="{{ route('auth.facebook') }}"><i class="fa fa-facebook"></i>login via facebook</a>
                                </div>
                            </div>
                        </div>
                        <div class="large-2 medium-2 columns show-for-large">
                            <div class="middle-text text-center hide-for-small-only" data-equalizer-watch="" style="min-height: 314px;">
                                <p>
                                    <i class="fa fa-arrow-left arrow-left"></i>
                                    <span>OR</span>
                                    <i class="fa fa-arrow-right arrow-right"></i>
                                </p>
                            </div>
                        </div>
                        <div class="large-4 medium-6 columns end">
                            <div class="register-form">
                                <h5 class="text-center">Create your Account</h5>
                                <form method="POST" action="{{ url('/register') }}" data-abide="g47ytt-abide" novalidate>
                                    {{ csrf_field() }}
                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-user-plus"></i></span>
                                        <input class="input-group-field {{ $errors->has('full_name') ? 'is-invalid-input' : '' }}"
                                               name="full_name" id="full_name" type="text" placeholder="Enter your Full Name" />
                                        @if ($errors->has('full_name'))
                                            <span class="form-error is-visible">
                                                {{ $errors->first('full_name') }}
                                            </span>
                                        @endif
                                    </div>


                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-user"></i></span>
                                        <input class="input-group-field {{ $errors->has('username') ? 'is-invalid-input' : '' }}"
                                               name="username" type="text" placeholder="Enter your username">
                                        @if ($errors->has('username'))
                                            <span class="form-error is-visible">
                                                {{ $errors->first('username') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                        <input class="input-group-field {{ $errors->has('email') ? 'is-invalid-input' : '' }} "
                                               name="email" type="email" placeholder="Enter your email">
                                        @if ($errors->has('email'))
                                            <span class="form-error is-visible">
                                                {{ $errors->first('email') }}
                                            </span>
                                        @endif
                                    </div>


                                    <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <span class="input-group-label "><i class="fa fa-lock"></i></span>
                                        <input id="password" class="{{ $errors->has('password') ? 'is-invalid-input' : '' }}"
                                               type="password" name="password" placeholder="Enter your password">
                                        @if ($errors->has('password'))
                                            <span class="form-error is-visible">
                                                {{ $errors->first('password') }}
                                            </span>
                                        @endif
                                    </div>

                                    <div class="input-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                        <input class="{{ $errors->has('password_confirmation') ? 'is-invalid-input' : '' }}" type="password" name="password_confirmation" placeholder="Re-type your password"  id="password_confirmation">
                                        @if ($errors->has('password_confirmation'))
                                            <span class="form-error is-visible">
                                                {{ $errors->first('password_confirmation') }}
                                            </span>
                                        @endif
                                    </div>

                                    <button class="button expanded" type="submit" name="submit">register Now</button>
                                    <p class="loginclick">
                                        <a href="{{ route('auth.login') }}">Login here</a>
                                        <a href="{{ route('auth.login') }}">Already have acoount?</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
