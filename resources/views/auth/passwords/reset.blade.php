@extends('layouts.master')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
                        <li>
                            <span class="show-for-sr">Current: </span> Reset Password
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
                                <h3>Reset Password</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer="osmss8-equalizer" data-equalize-on="medium" id="test-eq" data-resize="hli7x7-eq" data-events="resize">
                        <div class="large-4 medium-6 large-centered medium-centered columns">
                            <div class="register-form">
                                @if(session()->has('status'))
                                    <div data-abide-error class="success callout">
                                        <p><i class="fa fa-info"></i>  {{ session()->get('status') }} </p>
                                    </div>
                                @endif
                                <form method="post" data-abide="pyi7za-abide" novalidate="" action="{{ url('/password/reset') }}">
                                    {!! csrf_field() !!}

                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="{{ $errors->has('email') ? 'is-invalid-input' : '' }}"
                                               value="{{ old('email') }}" name="email" id="email"
                                               placeholder="Enter your email" required="">
                                        <span class="form-error">Email is required</span>
                                        @if ($errors->has('email'))
                                            <span class="form-error is-visible">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="input-group ">
                                        <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                        <input class="" type="password" class="{{ $errors->has('password') ? 'is-invalid-input' : '' }}" name="password" placeholder="Enter your password" id="password" required>
                                        <span class="form-error">Password is required</span>
                                        @if ($errors->has('password'))
                                            <span class="form-error is-visible">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>

                                    <div class="input-group ">
                                        <span class="input-group-label"><i class="fa fa-lock"></i></span>
                                        <input class="" type="password" class="{{ $errors->has('password_confirmation') ? 'is-invalid-input' : '' }}" name="password_confirmation" placeholder="Re-type your password" id="password_confirmation">
                                        <span class="form-error">Re-cofirm Password</span>
                                        @if ($errors->has('password_confirmation'))
                                            <span class="form-error is-visible">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>





                                    <button class="button expanded" type="submit" name="submit">reset Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
