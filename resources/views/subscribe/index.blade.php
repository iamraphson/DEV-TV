<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/10/16
 * Time: 21:24
 */
?>
@extends('layouts.master')

@section('content')
<!--breadcrumbs-->
<section id="breadcrumb">
    <div class="row">
        <div class="large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home"></i><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ route('account.user') }}">Profile</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Subscribe
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!--end breadcrumbs-->
<section class="topProfile">
    <div class="profile-stats">
        <div class="row secBg">
            <div class="large-12 columns">
                <div class="profile-author-img float-left">
                    @if($profile->avatar_url)
                        <img src="{!! $profile->avatar_url !!}" alt="profile author img">
                    @else
                        <span>{{ substr($profile->name, 0, 1) }}</span>
                    @endif
                </div>
                <div class="clearfix">
                    <div class="profile-author-name float-left">
                        <h4>{{ $profile->name }}</h4>
                        <p>Join Date : <span>{{ date('j F y', strtotime($profile->created_at)) }}</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End profile top section -->
<div class="row">
    @if(count($errors) > 0)
        <div data-abide-error class="alert callout success">
            @foreach ($errors->all() as $error)
                <p><i class="fa fa-exclamation-triangle"></i> {{ $error }} </p>
            @endforeach
        </div>
    @endif
    @if(session()->has('info'))
        <div class="callout success">
            <p><i class="fa fa-info"></i> {{session()->get('info')}}. </p>
        </div>
        @endif
        @include('account.sidenav')
                <!-- right side content area -->
        <div class="large-8 columns profile-inner">
            <!-- profile settings -->
            <section class="profile-settings">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="heading">
                            <i class="fa fa-money"></i>
                            <h4>Subscribe</h4>
                        </div>
                        <div class="row">
                            <div class="large-12 columns">
                                <div class="setting-form">
                                    <form method="post" action="{{ route('subscribe.pay') }}">
                                        <div class="setting-form-inner">
                                            <div class="row">
                                                <div class="medium-6 columns">
                                                    <label for="firstname">First Name:
                                                        <input type="text" id="firstname" name="firstname" placeholder="First Name"
                                                        value="{{ old('firstname') }}" />
                                                    </label>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label for="lastname">Last Name:
                                                        <input type="text" id="lastname" name="lastname" placeholder="Last Name"
                                                               value="{{ old('lastname') }}"/>
                                                    </label>
                                                </div>
                                                <div class="large-12 columns">
                                                    <label for="credit_card">Credit Card Number:
                                                        <input type="text" name="credit_card" value="{{ old('credit_card') }}"
                                                               id="credit_card" placeholder="Credit card number">
                                                    </label>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label for="ccv">Security Code:
                                                        <input type="text" id="ccv" name="ccv" placeholder="Security Code" />
                                                    </label>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label for="cardmm">Expiry:
                                                        <p>
                                                            <select name="cardmm" id="cardmm" style="width: 45%">
                                                                @for($i=1; $i<=12; $i++)
                                                                <option value="{{ $i }}">{{ $i }}</option>
                                                                @endfor
                                                            </select>
                                                            <select name="cardyy" id="cardyy" style="width: 45%">
                                                                @for($i=0; $i<=10; $i++)
                                                                    <option value="{{ date('Y') + $i }}">{{ date('Y') + $i }}</option>
                                                                @endfor
                                                            </select>
                                                        </p>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <div class="setting-form-inner">
                                            <button class="button expanded" type="submit" name="setting">Pay Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End profile settings -->
        </div><!-- end left side content area -->
</div>
@endsection
@section('footer')
    <script src="{{ asset('js/jquery.payment.js') }}"></script>
    <script type="text/javascript">
        jQuery(function(){
            jQuery('#credit_card').payment('formatCardNumber');
            jQuery('input#ccv').payment('formatCardCVC');
        });
    </script>
@endsection


