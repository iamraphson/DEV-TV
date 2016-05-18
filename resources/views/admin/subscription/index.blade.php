<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/15/16
 * Time: 23:22
 */
?>
@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3 style="display: inline-block">
                        <i class="glyphicon glyphicon-list-alt"></i> Subscription History
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">New Video Data</h5>
            <form action="" method="get" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                        <label class="form-label" for="emails">Email</label>
                        <fieldset class="form-group">
                            <div class="typeahead-container">
                                <div class="typeahead-field">
                                        <span class="typeahead-query">
                                            <input id="emails" class="form-control" name="emails" type="search" autocomplete="off"
                                                   value="{{ Request()->input('emails') }}" >
                                        </span>
                                        <span class="typeahead-button">
                                            <button type="button">
                                                <span class="font-icon-search"></span>
                                            </button>
                                        </span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="startdate">Start Date</label>
                            <div class='input-group date datetimepicker-1'>
                                <input type='text' id="startdate" name="startdate" value="{{ Request()->input('startdate') }}"
                                       class="form-control" />
                                    <span class="input-group-addon">
                                        <i class="font-icon font-icon-calend"></i>
                                    </span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-6">
                        <fieldset class="form-group">
                            <label class="form-label" for="enddate">End Date</label>
                            <div class='input-group date datetimepicker-1'>
                                <input type='text' id="enddate" name="enddate" class="form-control"
                                       value="{{ Request()->input('enddate') }}"/>
                                    <span class="input-group-addon">
                                        <i class="font-icon font-icon-calend"></i>
                                    </span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md text-center">
                        <button type="submit" class="btn btn-rounded btn-inline btn-success">Search</button>
                    </div>
                </div>
            </form>
            <div class="col-xs-12 m-b-md">
                <h5 class="with-border m-t-lg"></h5>
            </div>
            <div id="toolbar">
                Subscription History
            </div>
            <div class="table-responsive" style="border: 1px solid #ddd">
                <table id="table"
                       data-search="true"
                       data-pagination="true"
                       data-toolbar="#toolbar">
                    <thead>
                    <tr>
                        <th data-sortable="true">Payment Method</th>
                        <th data-sortable="true">Done By</th>
                        <th data-sortable="true">Owner</th>
                        <th data-sortable="true">Start Date</th>
                        <th data-sortable="true">End Date</th>
                        <th data-sortable="true">Transcation Id</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0 ?>
                    @foreach($historys as $history)
                        <tr data-index="{{ $i }}">
                            <td>{{ $history->payment_method }}</td>
                            <td>{{ $history->doneby }}</td>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->started_time }}</td>
                            <td>{{ $history->purchase_time }}</td>
                            <td>
                                <a href="{{ route('user.subscription.show', $history->transaction_id) }}">
                                    {{ $history->transaction_id }}
                                </a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop

@section('footer')
    <script src="{{ asset('wpanel/js/bootstrap-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('wpanel/js/bootstrap-table/jquery-ui.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/typeahead/jquery.typeahead.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('wpanel/css/bootstrap-table/bootstrap-table.min.css') }}">
    <script type="text/javascript">
        $(document).ready(function() {
            var $table = $('#table');
            $table.bootstrapTable({
                iconsPrefix: 'font-icon',
                icons: {
                    paginationSwitchDown:'font-icon-arrow-square-down',
                    paginationSwitchUp: 'font-icon-arrow-square-down up',
                    refresh: 'font-icon-refresh',
                    toggle: 'font-icon-list-square',
                    columns: 'font-icon-list-rotate',
                    export: 'font-icon-download',
                    detailOpen: 'font-icon-plus',
                    detailClose: 'font-icon-minus-1'
                },
                paginationPreText: '<i class="font-icon font-icon-arrow-left"></i>',
                paginationNextText: '<i class="font-icon font-icon-arrow-right"></i>'
            });

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

