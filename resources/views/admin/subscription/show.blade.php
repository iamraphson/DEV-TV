<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/16/16
 * Time: 21:10
 */
?>
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
                        <i class="font-icon font-icon-notebook"></i>  Subscription Info
                    </h3>
                </div>
            </div>
        </div>
    </header>
    <section class="card">
        <div class="card-block">
            <h5 class="with-border">Subscription</h5>
            <div class="row">
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>Transaction ID</td>
                                <td>{{ $detail->transaction_id }}</td>
                            </tr>
                            <tr>
                                <td>Payment Description</td>
                                <td>{{ $detail->payment_desc }}</td>
                            </tr>
                            <tr>
                                <td>Payment Method</td>
                                <td>{{ $detail->payment_method }}</td>
                            </tr>
                            <tr>
                                <td>Comment</td>
                                <td>{{ $detail->comment }}</td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ $detail->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $detail->user->email }}</td>
                            </tr>
                            <tr>
                                <td>Amount</td>
                                <td>{{ $detail->amount }}</td>
                            </tr>
                            <tr>
                                <td>Discount</td>
                                <td>{{ $detail->discount }}</td>
                            </tr>
                            <tr>
                                <td>Total Amount</td>
                                <td>{{ $detail->total_amt }}</td>
                            </tr>
                            <tr>
                                <td>Purchase Date</td>
                                <td>{{ $detail->purchase_time }}</td>
                            </tr>
                            <tr>
                                <td>Start Date</td>
                                <td>{{ $detail->started_time }}</td>
                            </tr>
                            <tr>
                                <td>End Date</td>
                                <td>{{ $detail->end_time }}</td>
                            </tr>
                            <tr>
                                <td>Transaction Was Done By</td>
                                <td>{{ $detail->doneby }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2">
                    <a class="btn btn-rounded btn-grey float-left" href="{{ route('user.subscription.index') }}">← Back</a>
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer')

@stop
