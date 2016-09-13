<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 8/26/16
 * Time: 21:56
 */
?>
@extends('layouts.master')
@section('content')
    <section class="content">
        <div class="row secBg" style="margin: 10px auto">
            <!-- left side content area -->
            <div class="large-12 columns">
                <div class="sidebarBg"></div>
                <section class="content content-with-sidebar">
                    <!-- newest video -->
                    <div class="main-heading borderBottom">
                        <div class="row padding-14 ">
                            <div class="medium-8 small-8 columns">
                                <div class="head-title">
                                    <i class="fa fa-film"></i>
                                    <h4>{{ $operationTitle }}</h4>
                                </div>
                            </div>
                            <div class="medium-4 small-4 columns">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row column head-text clearfix">
                                <p class="pull-left">All Videos : <span>{{ count($videos) }} Videos posted</span></p>
                                <div class="grid-system pull-right show-for-large">
                                    <a class="secondary-button current grid-default" href="#">
                                        <i class="fa fa-th"></i></a>
                                    <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="tabs-content" data-tabs-content="newVideos">
                                <div class="tabs-panel is-active" id="new-all">
                                    <div class="row list-group">
                                        @if($videos->isEmpty())
                                            <div style="width: 95%;margin: auto">
                                                <div data-abide-error="" class="alert callout" style="display: block;">
                                                    <p><i class="fa fa-exclamation-triangle"></i> No Videos Yet</p>
                                                </div>
                                            </div>
                                        @else
                                            @foreach($videos as $video)
                                                <div class="item large-3 medium-6 columns group-item-grid-default"
                                                     style="float: left;">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="{{ URL::asset($video->video_cover_location) }}"
                                                                 alt="{{ $video->video_title }}" />
                                                            <a href="{{ url('/video/' . $video->video_id) }}"
                                                               class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
                                                                <div class="thumb-stats pull-left">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>g</span>
                                                                </div>
                                                                <div class="thumb-stats pull-right">
                                                                    <span>{{ getVideoDuration($video->video_duration) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-des">
                                                            <h6><a href="{{ url('/video/' . $video->video_id) }}">
                                                                    {{ str_limit($video->video_title, 45) }}
                                                                </a></h6>
                                                            <div class="post-stats clearfix">
                                                                <p class="pull-left">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span> {{ date('j F y', strtotime($video->created_at)) }}</span>
                                                                </p>
                                                                <p class="pull-left">
                                                                    <i class="fa fa-eye"></i>
                                                                    <span>{!! kilomega($video->video_views) !!}</span>
                                                                </p>
                                                            </div>
                                                            <div class="post-summary">
                                                                <p>{{ str_limit($video->video_desc, 200) }}</p>
                                                            </div>
                                                            <div class="post-button">
                                                                <a href="{{ url('/video/' . $video->video_id) }}"
                                                                   class="secondary-button">
                                                                    <i class="fa fa-play-circle"></i>
                                                                    watch video</a>
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
        </div>
    </section>
@endsection

