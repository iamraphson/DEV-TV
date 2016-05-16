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

    <section class="box-typical">
        <div id="toolbar">
            All Users
        </div>
        <div class="table-responsive">
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
                        <td>{{ $history->end_time }}</td>
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
    </section><!--.box-typical-->
@stop

@section('footer')
    <script src="{{ asset('wpanel/js/bootstrap-table/bootstrap-table.js') }}"></script>
    <script src="{{ asset('wpanel/js/bootstrap-table/jquery-ui.js') }}"></script>
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

