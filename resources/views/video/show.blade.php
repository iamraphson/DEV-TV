<?php
    /**
     * Created by PhpStorm.
     * User: Raphson
     * Date: 8/16/16
     * Time: 07:24
     */
?>
@extends('layouts.master')

@section('content')
    <!--breadcrumbs-->
    <section id="breadcrumb" class="breadMargin" style="background-color: #f0f0f0">
    </section>
    <!--end breadcrumbs-->
    <!-- full width Video -->
    <section class="fullwidth-single-video"
             style="background-image:url({{ $video->video_cover_location }})">
        <div class="row">
            <div class="large-12 columns">
                <div class="flex-video widescreen">
                    @if($video->video_access == "guest")
                        {!! getVideoPlayer($video) !!}
                    @elseif($video->video_access == "registered" and Auth::check())
                        {!! getVideoPlayer($video) !!}
                    @elseif(($video->video_access == "subscriber" and $subscription_status)
                        or (Auth::check() and Auth::user()->role == "admin"))
                        {!! getVideoPlayer($video) !!}
                    @elseif($video->video_access == "subscriber" and Auth::check())
                        <div id="subscribers_only">
                            <h2>Sorry, this video is only available to Subscribers</h2>
                            <div class="clear"></div>
                            <form method="get" action="/user/subscribe">
                                <button id="button">Subscribe now! </button>
                            </form>
                        </div>
                    @else
                        <div id="subscribers_only">
                            <h2>Sorry, this video is only available to Subscribers</h2>
                            <div class="clear"></div>
                            <form method="get" action="/register">
                                <button id="button">Signup Now to Become a Subscriber</button>
                            </form>
                        </div>
                    @endif
                    {{--{!! getVideoPlayer($video) !!}--}}
                </div>
            </div>
        </div>
    </section>

<div class="row">
    <!-- left side content area -->
    <div class="large-8 columns">
        <!-- single post stats -->
        <section class="SinglePostStats">
            <!-- newest video -->
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="media-object stack-for-small">
                        <div class="media-object-section object-second">
                            <div class="author-des clearfix">
                                <div class="post-title">
                                    <h4>{{ $video->video_title }}</h4>
                                    <p>
                                        <span><i class="fa fa-clock-o"></i>{{ date('j F y',
                                        strtotime($video->created_at)) }}</span>
                                        <span><i class="fa fa-eye"></i>
                                            {!! kilomega($video->video_views) !!} views
                                        </span>
                                        <span><i class="fa fa-heart"></i>
                                            <span id="favoritescount">{!! kilomega($video->video_favorites) !!}</span>
                                        </span>
                                    </p>
                                </div>
                                <div class="subscribe">
                                    <a class="favorite @if($video->isFavourite){{ 'active' }}@endif"
                                       href="javascript:void(0)"
                                       data-authenticated=
                                       "@if(Auth::check()){{Auth::user()->id}}@endif"
                                       data-videoid="{{ $video->video_id }}">
                                        <i class="fa fa-heart"></i> Favorite</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <div class="post-like-btn clearfix">
                                    <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="{{ Request::url() }}">
                                        <!-- Total -->
                                        <button data-easyshare-button="total">
                                            <span>Total</span>
                                        </button>
                                        <span data-easyshare-total-count>0</span>

                                        <!-- Facebook -->
                                        <button data-easyshare-button="facebook">
                                            <span class="fa fa-facebook"></span>
                                            <span>Share</span>
                                        </button>
                                        <span data-easyshare-button-count="facebook">0</span>

                                        <!-- Twitter -->
                                        <button data-easyshare-button="twitter" data-easyshare-tweet-text="">
                                            <span class="fa fa-twitter"></span>
                                            <span>Tweet</span>
                                        </button>
                                        <span data-easyshare-button-count="twitter">0</span>

                                        <!-- Google+ -->
                                        <button data-easyshare-button="google">
                                            <span class="fa fa-google-plus"></span>
                                            <span>+1</span>
                                        </button>
                                        <span data-easyshare-button-count="google">0</span>

                                        <div data-easyshare-loader>Loading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End single post stats -->

        <!-- single post description -->
        <section class="singlePostDescription">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="heading">
                        <h5>Description</h5>
                    </div>
                    <div class="description showmore_one">
                        <p> {!! $video->video_details !!}  </p>
                        <div class="tags">
                            <button><i class="fa fa-tags"></i>Tags</button>
                            @foreach($tags as $tag)
                                <a href="#" class="inner-btn">{{ $tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End single post description -->

        <section class="content comments">
            <div class="row secBg">
                <div class="large-12 columns">
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-12 small-12 columns">
                                <div class="head-title">
                                    <i class="fa fa-comments"></i>
                                    <h4>Comments</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-comment">
                        <div id="disqus_thread"></div>
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
                        <form id="searchform" action="{{ url("/video/search/all") }}" method="get" role="search">
                            <div class="input-group">
                                <input class="input-group-field" name="search"
                                       type="text" placeholder="Enter your keyword">
                                <div class="input-group-button">
                                    <input type="submit" class="button" value="Submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End search Widget -->

                <!-- most view Widget -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Most View Videos</h5>
                        </div>
                        <div class="widgetContent">
                            @include('layouts.partials.mostviewvideo')
                        </div>
                    </div>
                </div><!-- end most view Widget -->
                <!-- Recent post videos -->
                <div class="large-12 medium-7 medium-centered columns">
                    <div class="widgetBox">
                        <div class="widgetTitle">
                            <h5>Recent post videos</h5>
                        </div>
                        <div class="widgetContent">
                            @include('layouts.partials.recentvideos')
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
                            @include('layouts.partials.systemtags')
                        </div>
                    </div>
                </div><!-- End tags -->
            </div>
        </aside>
    </div><!-- end sidebar -->
</div>
@endsection
