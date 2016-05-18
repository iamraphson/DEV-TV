<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/15/16
 * Time: 20:01
 */
?>
@extends('wpanel.master')

@section('content')
    <header class="section-header" xmlns="http://www.w3.org/1999/html">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="font-icon font-icon-plus-1"></i> Add User's Subscription
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
            <h5 class="with-border">Subscription</h5>
            <form  action="{{ route('user.subscription.store') }}" method="post" class="form-horizontal">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label" for="emails">Email</label>
                        <div class="typeahead-container">
                            <div class="typeahead-field">
                                <span class="typeahead-query">
                                    <input id="emails" class="form-control" name="emails" type="search" autocomplete="off">
                                </span>
                                <span class="typeahead-button">
                                    <button type="button">
                                        <span class="font-icon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">Start Date</label>
                            <div class='input-group date datetimepicker-1'>
                                <input type='text' id="startdate" name="startdate" class="form-control" />
								<span class="input-group-addon">
									<i class="font-icon font-icon-calend"></i>
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="form-label">End Date</label>
                            <div class='input-group date datetimepicker-1'>
                                <input type='text' id="enddate" name="enddate" class="form-control" />
								<span class="input-group-addon">
									<i class="font-icon font-icon-calend"></i>
								</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="payment_desc">Payment Description</label>
                            <textarea name="payment_desc" class="form-control" id="payment_desc">{{ old('payment_desc') }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="form-group">
                            <label class="form-label">Comment</label>
                            <textarea name="comment" class="form-control" id="comment">{{ old('comment') }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="amount">Amount</label>
                            <input class="form-control" name="amount" id="amount" type="text" value="{{ old('amount') | 0 }}" />
                        </fieldset>
                    </div>
                    <div class="col-md-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="discount">Discount</label>
                            <input id="discount" class="form-control" name="discount" type="text" value="{{ old('discount') | 0 }}">
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="button" id="submitsubscription"
                                class="btn btn-rounded btn-inline btn-success pull-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop

@section('footer')
    <script type="text/javascript" src="{{ asset('wpanel/js/typeahead/jquery.typeahead.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/input-mask/jquery.mask.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#discount').mask('000.00', {reverse: true});
            $('#amount').mask('000.00', {reverse: true});

            var emails = [];
            @foreach($users as $user)
                emails.push("{{$user->email}}");
            @endforeach

            $('#emails').typeahead({
                minLength: 0,
                maxItem: 10,
                order: "asc",
                hint: true,
                accent: true,
                searchOnFocus: true,
                backdrop: {
                    "background-color": "#3879d9",
                    "opacity": "0.1",
                    "filter": "alpha(opacity=10)"
                },
                source: emails
            });

            $('#submitsubscription').click(function(){
                if(confirm("Are you sure,you want to Subscribe For this account"))
                    $(this).closest('form').submit();
            });

            @if(session()->has('info'))
                $.notify({
                    icon: 'font-icon font-icon-check-circle',
                    message: '{{ session()->get('info') }}'
                },{
                    type: 'success'
                });
            @endif
        });
    </script>
@stop
