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
<div class="row" id="contents">
    @if(count($errors) > 0)
        <div data-abide-error class="alert callout">
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
                                    @if(Auth::user()->role != "admin")
                                    <form method="post" id="paymentform" action="{{ route('subscribe.pay') }}">
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
                                                    <label for="credit_card" class="form-group">Credit Card Number:
                                                        <input type="text" name="credit_card" value="{{ old('credit_card') }}"
                                                               id="credit_card" class="cc-number" autocomplete="off"
                                                               placeholder="Credit card number">
                                                        <span class="form-error">
                                                            Your card is not valid!
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label for="ccv" class="form-group">CCV Code:
                                                        <input type="text" id="ccv" class="cc-cvc" name="ccv"
                                                               placeholder="CCV" autocomplete="off" />
                                                         <span class="form-error">
                                                            Your CCV Code is not valid!
                                                        </span>
                                                    </label>
                                                </div>
                                                <div class="medium-6 columns">
                                                    <label for="cardexpiry" class="form-group">Expiry:
                                                        <input type="text" id="cardexpiry" class="cc-exp" name="cardexpiry"
                                                               placeholder="MM/YY" autocomplete="off"/>
                                                         <span class="form-error">
                                                            Your Expiry Date is not valid!
                                                        </span>
                                                    </label>
                                                </div>

                                            </div>
                                        </div>
                                        {{ csrf_field() }}
                                        <div class="setting-form-inner">
                                            <button class="button expanded" type="button" name="paynow" id="paynow">Pay Now</button>
                                        </div>
                                    </form>
                                    @else
                                        <h3 style="text-align: center;margin: 130px 0px">No Subscription Is Allowed</h3>
                                    @endif
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
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        Stripe.setPublishableKey('{!! env('STRIPE_PK') !!}');
        var $ = jQuery;
        $(function(){
            $.fn.toggleInputError = function(erred) {
                this.parent('.form-group').toggleClass('has-error', erred);
                this.parent('.form-group').children('.form-error') .toggleClass('is-visible', erred);
                return this;
            };

            $('#credit_card').payment('formatCardNumber');
            $('input#ccv').payment('formatCardCVC');
            $('input#cardexpiry').payment('formatCardExpiry');

            $('#paynow').click(function(e) {
                e.preventDefault();
                var that = $(this);
                var cardType = $.payment.cardType($('.cc-number').val());
                $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
                $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
                $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));

                $(this).attr('disabled', 'disabled');
                $("#credit_card, #ccv, #cardexpiry").attr('disabled', 'disabled');

                Stripe.card.createToken({
                    name: $('#firstname').val() + ' ' + $('#lastname').val(),
                    number: $('#credit_card').val(),
                    cvc: $('#ccv').val(),
                    exp: $('#cardexpiry').val()
                }, function(status, response) {
                    if(status == 200 && (response.id)) {
                        $(that).closest('form').append('<input type="hidden" name="card_token" value="' + response.id + '"/>').submit();
                        return false;
                    } else {
                        if(status != 200) {
                            $('#contents').
                            prepend('<div data-abide-error class="alert callout"><p><i class="fa fa-exclamation-triangle"></i>' +
                                    response.error.message + '</p></div>');
                        } else {
                            $('#contents').
                            prepend('<div data-abide-error class="alert callout"><p><i class="fa fa-exclamation-triangle"></i>' +
                                    'Empty Stripe Token' + '</p> </div>');
                        }
                        $("#card_number, #card_cvv, #card_expiry").removeAttr('disabled');
                        $(that).removeAttr('disabled');
                    }
                });
                return false;
            });
        });


    </script>
@endsection


