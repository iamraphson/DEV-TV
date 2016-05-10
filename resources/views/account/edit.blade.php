<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/8/16
 * Time: 22:06
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
                        <span class="show-for-sr">Current: </span> Profile Setting
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
                        <i class="fa fa-gears"></i>
                        <h4>profile Settings</h4>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="setting-form">
                                <form method="post" action="{{ route('account.update') }}" enctype="multipart/form-data">
                                    <div class="setting-form-inner">
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <h6 class="borderBottom">Profile Setting:</h6>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="fullname">Name:
                                                    <input type="text" name="fullname" value="{{ $profile->name }}"
                                                           id="fullname" placeholder="enter your full name..">
                                                </label>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="username">Username:
                                                    <input type="text" name="username" value="{{ $profile->username }}"
                                                           id="username" placeholder="enter your username..">
                                                </label>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="email">Email:
                                                    <input type="text" id="email" value="{{ $profile->email }}" disabled>
                                                </label>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="avatar">Avatar:
                                                    <input type="file" name="avatar" id="avatar" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    {!! method_field('PUT') !!}
                                    {{ csrf_field() }}
                                    <div class="setting-form-inner">
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <h6 class="borderBottom">Update Password (leave empty to keep your original password):</h6>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="new_password">New Password:
                                                    <input type="password" placeholder="enter your new password.."
                                                           name="new_password" id="new_password">
                                                </label>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label for="new_password_confirmation">Retype Password:
                                                    <input type="password" placeholder="enter your new password.."
                                                       name="new_password_confirmation" id="new_password_confirmation" >
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="setting-form-inner">
                                        <button class="button expanded" type="submit" name="setting">update now</button>
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


