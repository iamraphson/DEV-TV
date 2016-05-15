<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/15/16
 * Time: 12:42
 */
?>
@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="glyphicon glyphicon-user"></i> Edit {{ $user->username }}
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">{{ $user->name }}</h5>
            <form enctype="multipart/form-data" action="{{ route('user.update', $user->id) }}"
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

                {!! method_field('PUT') !!}
                {{ csrf_field() }}
                <div class=" row">
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="avatar">User's Avatar</label>
                            <div class="with-border">
                                @if($user->avatar_url)
                                    <img src="{{ $user->avatar_url }}"
                                         alt="{{ $user->username }}" class="video-img"/>
                                @else
                                    <div class="profile__image" style="background: url('') #D8D8D8 center/cover;">
                                        <span>{{ substr($user->name, 0, 1) }}</span>
                                    </div>
                                @endif
                            </div>
                            <input type="file" class="form-control" name="avatar" id="avatar" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="fullname">Name</label>
                            <input type="text" class="form-control"
                                   id="fullname" name="fullname" value="{{ $user->name }}" placeholder="Name" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" class="form-control"
                                   id="username" name="username" value="{{ $user->username }}" placeholder="Username" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" class="form-control"
                                   id="email" name="email" value="{{ $user->email }}" placeholder="Email" />
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
                                    @if($user->role == "user")
                                        {{ 'selected="selected"' }}
                                    @endif
                                    >User</option>
                                    <option value="admin"
                                    @if($user->role == "admin")
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
                                @if($user->active == "1")
                                    {{ 'checked' }}
                                @endif
                                />
                                <label for="useractive">User Active Status</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="submit" class="btn btn-rounded btn-inline btn-success pull-right">Submit</button>
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

