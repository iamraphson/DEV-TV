@extends('layouts.master')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="large-12 columns">
                <nav aria-label="You are here:" role="navigation">
                    <ul class="breadcrumbs">
                        <li><i class="fa fa-home"></i><a href="#">Home</a></li>
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
                                <h3>Forgot Password</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row" data-equalizer="osmss8-equalizer" data-equalize-on="medium" id="test-eq" data-resize="hli7x7-eq" data-events="resize">
                        <div class="large-4 medium-6 large-centered medium-centered columns">
                            <div class="register-form">
                                <h5 class="text-center">Enter Email</h5>
                                <form method="post" data-abide="pyi7za-abide" novalidate="">
                                    <div class="input-group">
                                        <span class="input-group-label"><i class="fa fa-user"></i></span>
                                        <input type="email" placeholder="Enter your email" required="">
                                        <span class="form-error">email is required</span>
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
