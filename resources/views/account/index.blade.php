<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/7/16
 * Time: 23:38
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
                                            <a href="{{ route('account.edit') }}"><i class="fa fa-user"></i>Profile Setting</a>
                                        </li>
                                        <li class="clearfix">
                                            <a href=""><i class="fa fa-video-camera"></i>Videos
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
                <!-- single post description -->
                <section class="profile-videos">
                    <div class="row secBg">
                        <div class="large-12 columns">
                            <div class="heading">
                                <i class="fa fa-video-camera"></i>
                                <h4>My Favorites</h4>
                            </div>
                            <div class="profile-video">
                                <div class="media-object stack-for-small">
                                    <div class="media-object-section media-img-content">
                                        <div class="video-img">
                                            <img src="images/video-thumbnail/4.jpg" alt="video thumbnail">
                                        </div>
                                    </div>
                                    <div class="media-object-section media-video-content">
                                        <div class="video-content">
                                            <h5><a href="#">There are many variations of passage.</a></h5>
                                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore .</p>
                                        </div>
                                        <div class="video-detail clearfix">
                                            <div class="video-stats">
                                                <span><i class="fa fa-check-square-o"></i>published</span>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </div>
                                            <div class="video-btns">
                                                <form method="post">
                                                    <button type="submit" name="unfav"><i class="fa fa-heart-o"></i>Unfavorite</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="show-more-inner text-center">
                                <a href="#" class="show-more-btn">show more</a>
                            </div>
                        </div>
                    </div>
                </section><!-- End single post description -->
            </div><!-- end left side content area -->
        </div>
@endsection

