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
                        <i class="font-icon font-icon-user"></i> Users
                    </h3>

                    <a href="{{ route('user.create') }}" class="label-success label">
                        <i class="fa fa-plus-circle"></i> Add New</a>
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
                    <th data-sortable="true">Name</th>
                    <th data-sortable="true">Username</th>
                    <th data-sortable="true">Email</th>
                    <th data-sortable="true">UserType</th>
                    <th data-sortable="true">Subscription Status</th>
                    <th data-sortable="true">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0 ?>
                @foreach($users as $user)
                    <tr data-index="{{ $i }}">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            @if(($user->started_time < \Carbon\Carbon::now() AND
                            $user->end_time > \Carbon\Carbon::now())
                                or $user->role === "admin")
                                <div class="label label-success"><i class="fa fa-ticket"></i> Subscribed</div>
                            @else
                                <div class="label label-danger"><i class="fa fa-frown-o"></i> Cancelled</div>
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}"  class="label label-info">
                                <i class="glyphicon glyphicon-pencil"></i> Edit
                            </a>
                            @if($user->active == 1)
                                <a href="{{ route('user.suspend', $user->id) }}"  class="label label-danger"
                                   onclick="return confirm('Are you sure,you want to suspend the account')">
                                    <i class="glyphicon glyphicon-remove"></i> Suspend
                                </a>
                            @else
                                <a href="{{ route('user.activate', $user->id) }}"  class="label label-primary">
                                    <i class="font-icon font-icon-zigzag"></i> Activate
                                </a>
                            @endif
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
