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
                    <li><i class="fa fa-home"></i><a href="home-v1.html">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Profile
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
        {{--<div data-abide-error class="alert callout">
            @foreach ($errors->all() as $error)
                <p><i class="fa fa-exclamation-triangle"></i> {{ $error }} </p>
            @endforeach
        </div>--}}
    @endif
    <!-- left sidebar -->
    <div class="large-4 columns" style="padding-left: 0px;">
        <aside class="secBg sidebar">
            <div class="row">
                <!-- profile overview -->
                <div class="large-12 columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Profile Overview</h5>
                        </div>
                        <div class="widgetContent">
                            <ul class="profile-overview">
                                <li class="clearfix">
                                    <a href="#"><i class="fa fa-user"></i>Profile Setting</a>
                                </li>
                                <li class="clearfix">
                                    <a href="profile-video.html"><i class="fa fa-video-camera"></i>Videos
                                        <span class="float-right">36</span></a>
                                </li>
                                <li class="clearfix">
                                    <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div><!-- End profile overview -->
            </div>
        </aside>
    </div><!-- end sidebar -->
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
                                                <label>Avatar:
                                                    <input type="file" />
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
                                                <label>New Password:
                                                    <input type="password" placeholder="enter your new password..">
                                                </label>
                                            </div>
                                            <div class="medium-6 columns">
                                                <label>Retype Password:
                                                    <input type="password" placeholder="enter your new password..">
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


