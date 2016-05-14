<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/13/16
 * Time: 22:58
 */
?>
@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3 style="display: inline-block">
                        <i class="font-icon font-icon-archive"></i> Posts
                    </h3>

                    <a href="{{ route('post.create') }}" class="btn btn-rounded btn-success">
                        <i class="fa fa-plus-circle"></i> Add New</a>
                </div>
            </div>
        </div>
    </header>

    <section class="box-typical">
        <div id="toolbar">
            All Posts
        </div>
        <div class="table-responsive">
            <table id="table"
                   data-search="true"
                   data-pagination="true"
                   data-toolbar="#toolbar">
                <thead>
                <tr>
                    <th data-sortable="true">Post</th>
                    <th data-sortable="true">Post Slug</th>
                    <th data-sortable="true">Active</th>
                    <th data-sortable="true">Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </section><!--.box-typical-->
@stop

@section('head')
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
