<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/22/16
 * Time: 17:41
 */
?>
@extends('layouts.master')

@section('content')
<!--breadcrumbs-->
<section id="breadcrumb" class="breadMargin">
    <div class="row">
        <div class="large-12 columns">
            <nav aria-label="You are here:" role="navigation">
                <ul class="breadcrumbs">
                    <li><i class="fa fa-home"></i><a href="{{ url('/') }}">Home</a></li>
                    <li>
                        <span class="show-for-sr">Current: </span> Profile Setting
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
<!--end breadcrumbs-->
<!--Category Content-->
<section class="category-content">
    <div class="row">
        <!-- left side content area -->
        <div class="large-8 columns">
            <section class="content content-with-sidebar">
                <!-- newest video -->
                <div class="main-heading removeMargin">
                    <div class="row secBg padding-14 removeBorderBottom">
                        <div class="medium-8 small-12 columns">
                            <div class="head-title">
                                <i class="fa fa-film"></i>
                                <h4>{{ $tabHeader }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="row column head-text clearfix">
                            <div class="grid-system pull-right show-for-large">
                            </div>
                        </div>
                        <div class="tabs-content" data-tabs-content="newVideos">
                            <div class="tabs-panel is-active" id="new-all">
                                <div class="row list-group">

                                    @if($videos->isEmpty())
                                        <div style="width: 90%;margin: 100px auto;">
                                            <div data-abide-error="" class="alert callout" style="display: block;">
                                                <p><i class="fa fa-exclamation-triangle"></i> No Videos Yet</p>
                                            </div>
                                        </div>
                                    @else
                                        @foreach($videos as $video)
                                            <div class="item large-4 medium-6 columns list end">
                                                <div class="post thumb-border">
                                                    <div class="post-thumb">
                                                        <img src="{{ URL::asset($video->video_cover_location) }}"
                                                             alt="{{ $video->video_title }}">
                                                        <a href="{{ url('/video/' . $video->video_id) }}" class="hover-posts">
                                                            <span><i class="fa fa-play"></i>Watch Video</span>
                                                        </a>
                                                        <div class="video-stats clearfix">
                                                            <div class="thumb-stats pull-left">
                                                                <i class="fa fa-heart"></i>
                                                                <span>{{ $video->video_favorites }}</span>
                                                            </div>
                                                            <div class="thumb-stats pull-right">
                                                                <span>lam {{ getVideoDuration($video->video_duration) }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="post-des">
                                                        <h6><a href="{{ url('/video/' . $video->video_id) }}">{{ $video->video_title }}</a></h6>
                                                        <div class="post-stats clearfix">
                                                            <p class="pull-left">
                                                                <i class="fa fa-clock-o"></i>
                                                                <span>{{ date('j F y', strtotime($video->created_at)) }}</span>
                                                            </p>
                                                            <p class="pull-left">
                                                                <i class="fa fa-eye"></i>
                                                                <span>1,862K</span>
                                                            </p>
                                                        </div>
                                                        <div class="post-summary">
                                                            <p>{{ str_limit($video->video_desc, 200) }}</p>
                                                        </div>
                                                        <div class="post-button">
                                                            <a href="{{ url('/video/' . $video->video_id) }}" class="secondary-button">
                                                                <i class="fa fa-play-circle"></i>watch video</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="pag_closet">
                            {!! $videos->render() !!}
                        </div>
                    </div>
                </div>
            </section>
        </div><!-- end left side content area -->
        <!-- sidebar -->
        <div class="large-4 columns">
            <aside class="secBg sidebar">
                <div class="row">
                    <!-- search Widget -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox">
                            <div class="widgetTitle">
                                <h5>Search Videos</h5>
                            </div>
                            <form id="searchform" method="get" role="search">
                                <div class="input-group">
                                    <input class="input-group-field" type="text" placeholder="Enter your keyword">
                                    <div class="input-group-button">
                                        <input type="submit" class="button" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- End search Widget -->

                    <!-- Recent post videos -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox">
                            <div class="widgetTitle">
                                <h5>Recent post videos</h5>
                            </div>
                            <div class="widgetContent">
                                @if($videos_side->isEmpty())
                                    <div data-abide-error="" class="alert callout" style="display: block;">
                                        <p><i class="fa fa-exclamation-triangle"></i> No Videos Yet</p>
                                    </div>
                                @else
                                    @foreach($videos_side as $video)
                                        <div class="media-object stack-for-small">
                                            <div class="media-object-section">
                                                <div class="recent-img">
                                                    <img src= "{{ URL::asset($video->video_cover_location) }}"
                                                         alt="{{ $video->video_title }}">
                                                    <a href="{{  }}" class="hover-posts">
                                                        <span><i class="fa fa-play"></i></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="media-object-section">
                                                <div class="media-content">
                                                    <h6><a href="#">{{ str_limit($video->video_desc, 40) }}</a></h6>
                                                    <p>
                                                        <i class="fa fa-clock-o"></i>
                                                        <span>{{ date('j F y', strtotime($video->created_at)) }}</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div><!-- End Recent post videos -->

                    <!-- tags -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox">
                            <div class="widgetTitle">
                                <h5>Tags</h5>
                            </div>
                            <div class="tagcloud">
                                @foreach($tags as $tag)
                                    <a href="{{ $tag }}">{{ $tag }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div><!-- End tags -->


                </div>
            </aside>
        </div><!-- end sidebar -->
    </div>
</section><!-- End Category Content-->
@endsection



