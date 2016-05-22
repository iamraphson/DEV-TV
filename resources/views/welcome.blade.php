@extends('layouts.master')

@section('content')
    <section id="verticalSlider">
        <div class="row">
            <div class="large-12 columns">
                @if($featured->isEmpty())
                    <div data-abide-error="" class="alert callout" style="display: block;">
                        <p><i class="fa fa-exclamation-triangle"></i> No Featured Movies</p>
                    </div>
                @else
                    <div class="thumb-slider">
                        <div class="main-image">
                            <?php $i=0 ?>
                            @foreach($featured as $feat)
                                <div class="image {{ $i }}">
                                    <img src="{{ URL::asset($feat->video_cover_location) }}" alt="{{ $feat->video_title }}">
                                    <a href="#" class="hover-posts">
                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                    </a>
                                </div>
                                <?php $i++ ?>
                            @endforeach
                        </div>
                        <div class="thumbs">
                            <div class="thumbnails">
                                <?php $i=0 ?>
                                @foreach($featured as $feat)
                                    <div class="ver-thumbnail" id="{{ $i }}">
                                        <img src="{{ URL::asset($feat->video_cover_location) }}" alt="{{ $feat->video_title }}">
                                        <div class="item-title">
                                            <span>{{ array_get($category, $feat->video_category, 'Uncategorized')  }}</span>
                                            <h6>{{ str_limit($feat->video_desc, 45) }}</h6>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                @endforeach
                            </div>

                            <a class="up" href="javascript:void(0)"><i class="fa fa-angle-up"></i></a>
                            <a class="down" href="javascript:void(0)"><i class="fa fa-angle-down"></i></a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <section class="mainContentv3">
        <div class="row">
            <!-- left side content area -->
            <div class="large-8 columns parentbg">
                <div class="sidebarBg"></div>
                <section class="content content-with-sidebar">
                    <!-- newest video -->
                    <div class="main-heading borderBottom">
                        <div class="row padding-14 ">
                            <div class="medium-8 small-8 columns">
                                <div class="head-title">
                                    <i class="fa fa-film"></i>
                                    <h4>Newest Videos</h4>
                                </div>
                            </div>
                            <div class="medium-4 small-4 columns">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row column head-text clearfix">
                                <p class="pull-left">All Videos : <span>{{ number_format($count) }} Videos posted</span></p>
                                <div class="grid-system pull-right show-for-large">
                                    <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                    <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                    <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="tabs-content" data-tabs-content="newVideos">
                                <div class="tabs-panel is-active" id="new-all">
                                    <div class="row list-group">
                                        @if($videos->isEmpty())
                                            <div data-abide-error="" class="alert callout" style="display: block;">
                                                <p><i class="fa fa-exclamation-triangle"></i> No Videos Yet</p>
                                            </div>
                                        @else
                                            @foreach($videos as $video)
                                                <div class="item large-4 medium-6 columns grid-medium">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="{{ URL::asset($video->video_cover_location) }}"
                                                                alt="{{ $video->video_title }}" />
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
                                                                <div class="thumb-stats pull-left">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>506</span>
                                                                </div>
                                                                <div class="thumb-stats pull-right">
                                                                    <span>{{ getVideoDuration($video->video_duration) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-des">
                                                            <h6><a href="single-video-v2.html">
                                                                    {{ str_limit($video->video_title, 45) }}
                                                            </a></h6>
                                                            <div class="post-stats clearfix">
                                                                <p class="pull-left">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span> {{ date('j F y', strtotime($video->created_at)) }}</span>
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
                                                                <a href="single-video-v2.html" class="secondary-button">
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
                            <div class="text-center row-btn">
                                <a class="button radius" href="#">View All Video</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- popular video -->
                <section class="content content-with-sidebar">
                    <!-- popular Videos -->
                    <div class="main-heading borderBottom">
                        <div class="row padding-14">
                            <div class="medium-8 small-8 columns">
                                <div class="head-title">
                                    <i class="fa fa-star"></i>
                                    <h4>Most Popular Videos</h4>
                                </div>
                            </div>
                            <div class="medium-4 small-4 columns">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row column head-text clearfix">
                                <p class="pull-left">All Videos : <span>{{ number_format($count) }} Videos posted</span></p>
                                <div class="grid-system pull-right show-for-large">
                                    <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                    <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                    <a class="secondary-button current list" href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="tabs-content" data-tabs-content="popularVideos">
                                <div class="tabs-panel is-active" id="popular-all">
                                    <div class="row list-group">
                                        @if($videos->isEmpty())
                                            <div data-abide-error="" class="alert callout" style="display: block;">
                                                <p><i class="fa fa-exclamation-triangle"></i> No Videos Yet</p>
                                            </div>
                                        @else
                                            @foreach($videos as $video)
                                                <div class="item large-4 medium-6 columns grid-medium">
                                                    <div class="post thumb-border">
                                                        <div class="post-thumb">
                                                            <img src="{{ URL::asset($video->video_cover_location) }}"
                                                                 alt="{{ $video->video_title }}" />
                                                            <a href="single-video-v2.html" class="hover-posts">
                                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                                            </a>
                                                            <div class="video-stats clearfix">
                                                                <div class="thumb-stats pull-left">
                                                                    <i class="fa fa-heart"></i>
                                                                    <span>506</span>
                                                                </div>
                                                                <div class="thumb-stats pull-right">
                                                                    <span>{{ getVideoDuration($video->video_duration) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="post-des">
                                                            <h6><a href="single-video-v2.html">
                                                                    {{ str_limit($video->video_title, 45) }}
                                                                </a></h6>
                                                            <div class="post-stats clearfix">
                                                                <p class="pull-left">
                                                                    <i class="fa fa-clock-o"></i>
                                                                    <span> {{ date('j F y', strtotime($video->created_at)) }}</span>
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
                                                                <a href="single-video-v2.html" class="secondary-button">
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
                            <div class="text-center row-btn">
                                <a class="button radius" href="all-video.html">View All Video</a>
                            </div>
                        </div>
                    </div>
                </section><!-- End main content -->

            </div><!-- end left side content area -->
            <!-- sidebar -->
            <div class="large-4 columns">
                <aside class="sidebar">
                    <div class="sidebarBg"></div>
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

                        <!-- most view Widget -->
                        <div class="large-12 medium-7 medium-centered columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>Most View Videos</h5>
                                </div>
                                <div class="widgetContent">
                                    <div class="video-box thumb-border">
                                        <div class="video-img-thumb">
                                            <img src="http://localhost:8000/uploads/1463609726/minions.jpg" alt="most viewed videos">
                                            <a href="#" class="hover-posts">
                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                            </a>
                                        </div>
                                        <div class="video-box-content">
                                            <h6><a href="#">To Be Filled L8r </a></h6>
                                            <p>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </p>
                                        </div>
                                    </div>
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
                                                        <a href="#" class="hover-posts">
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
    </section>
@endsection
