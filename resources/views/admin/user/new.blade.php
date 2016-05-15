<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/15/16
 * Time: 17:21
 */
?>
@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="font-icon font-icon-plus-1"></i> Add New User
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">New User Data</h5>
            <form enctype="multipart/form-data" action="{{ route('user.store') }}"
                  method="post" class="form-horizontal">
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
                <div class=" row">
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="avatar">Avatar</label>
                            <input type="file" class="form-control" name="avatar" id="avatar" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="fullname">Name</label>
                            <input type="text" class="form-control"
                                   id="fullname" name="fullname" value="{{ old('fullname') }}" placeholder="Name" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control"
                                   id="username" name="username" value="{{ old('username') }}" placeholder="Username" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control"
                                   id="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="new_password">Password</label>
                            <input type="password" class="form-control"
                                   id="new_password" name="new_password" value="" placeholder="Password" />
                        </fieldset>
                    </div>
                    <div class="col-xs-4 m-b-md">
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label" for="userrole">User's Role</label>
                                <select class="bootstrap-select bootstrap-select-arrow" id="userrole" name="userrole">
                                    <option value="user"
                                    @if(old('userrole') == "user")
                                        {{ 'selected="selected"' }}
                                            @endif
                                    >User</option>
                                    <option value="admin"
                                    @if(old('userrole') == "admin")
                                        {{ 'selected="selected"' }}
                                            @endif
                                    >Admin</option>
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-3 p-t-2">
                        <fieldset class="form-group">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="useractive" name="useractive" value="1"
                                @if(old('useractive') == "1")
                                    {{ 'checked' }}
                                        @endif
                                />
                                <label for="useractive">User Active Status</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="submit" class="btn btn-rounded btn-inline btn-success pull-right">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop


@section('footer')
    <script type="text/javascript">
        $(function() {
            @if(session()->has('info'))
                $.notify({
                icon: 'font-icon font-icon-check-circle',
                message: '{{ session()->get('info') }}'
            },{
                type: 'success'
            });
            @endif
        })
    </script>
@stop


