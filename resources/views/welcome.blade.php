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
                                            <span>{{ $category[14]   }}</span>
                                            <h6>{{ str_limit($feat->video_desc, 45) }}</h6>
                                        </div>
                                    </div>
                                    <?php $i++ ?>
                                @endforeach
                               {{-- <div class="ver-thumbnail" id="2">
                                    <img src="images/vertical/2.png" alt="imaga">
                                    <div class="item-title">
                                        <span>Technology</span>
                                        <h6>The standard chunk of Lorem Ipsum used since.</h6>
                                    </div>
                                </div>--}}
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
                                <ul class="tabs text-right pull-right" data-tabs id="newVideos">
                                    <li class="tabs-title is-active"><a href="#new-all">all</a></li>
                                    <li class="tabs-title"><a href="#new-hd">HD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row column head-text clearfix">
                                <p class="pull-left">All Videos : <span>1,862 Videos posted</span></p>
                                <div class="grid-system pull-right show-for-large">
                                    <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                    <a class="secondary-button current grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                    <a class="secondary-button list" href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="tabs-content" data-tabs-content="newVideos">
                                <div class="tabs-panel is-active" id="new-all">
                                    <div class="row list-group">
                                        <div class="item large-4 medium-6 columns grid-medium">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/1.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item large-4 medium-6 columns grid-medium">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/7.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item large-4 medium-6 columns grid-medium">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/13.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item large-4 medium-6 columns grid-medium end">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/14.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs-panel" id="new-hd">
                                    <div class="row list-group">
                                        <div class="item large-4 medium-6 columns grid-medium">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/1.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item large-4 medium-6 columns grid-medium end">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/14.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center row-btn">
                                <a class="button radius" href="#">View All Video</a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- ad Section -->
                <div class="googleAdv text-center">
                    <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
                </div><!-- End ad Section -->

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
                                <ul class="tabs text-right pull-right" data-tabs id="popularVideos">
                                    <li class="tabs-title is-active"><a href="#popular-all">all</a></li>
                                    <li class="tabs-title"><a href="#popular-hd">HD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="row column head-text clearfix">
                                <p class="pull-left">All Videos : <span>1,862 Videos posted</span></p>
                                <div class="grid-system pull-right show-for-large">
                                    <a class="secondary-button grid-default" href="#"><i class="fa fa-th"></i></a>
                                    <a class="secondary-button grid-medium" href="#"><i class="fa fa-th-large"></i></a>
                                    <a class="secondary-button current list" href="#"><i class="fa fa-th-list"></i></a>
                                </div>
                            </div>
                            <div class="tabs-content" data-tabs-content="popularVideos">
                                <div class="tabs-panel is-active" id="popular-all">
                                    <div class="row list-group">
                                        <div class="item large-4 medium-6 columns list">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/1.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item large-4 medium-6 columns list">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/5.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item large-4 medium-6 columns list">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/7.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item large-4 medium-6 columns list end">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/6.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tabs-panel" id="popular-hd">
                                    <div class="row list-group">
                                        <div class="item large-4 medium-6 columns list">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/1.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item large-4 medium-6 columns list">
                                            <div class="post thumb-border">
                                                <div class="post-thumb">
                                                    <img src="images/video-thumbnail/7.jpg" alt="new video">
                                                    <a href="single-video-v2.html" class="hover-posts">
                                                        <span><i class="fa fa-play"></i>Watch Video</span>
                                                    </a>
                                                    <div class="video-stats clearfix">
                                                        <div class="thumb-stats pull-left">
                                                            <h6>HD</h6>
                                                        </div>
                                                        <div class="thumb-stats pull-left">
                                                            <i class="fa fa-heart"></i>
                                                            <span>506</span>
                                                        </div>
                                                        <div class="thumb-stats pull-right">
                                                            <span>05:56</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="post-des">
                                                    <h6><a href="single-video-v2.html">There are many variations of passage.</a></h6>
                                                    <div class="post-stats clearfix">
                                                        <p class="pull-left">
                                                            <i class="fa fa-user"></i>
                                                            <span><a href="#">admin</a></span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-clock-o"></i>
                                                            <span>5 January 16</span>
                                                        </p>
                                                        <p class="pull-left">
                                                            <i class="fa fa-eye"></i>
                                                            <span>1,862K</span>
                                                        </p>
                                                    </div>
                                                    <div class="post-summary">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto sequi nesciunt.</p>
                                                    </div>
                                                    <div class="post-button">
                                                        <a href="single-video-v2.html#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center row-btn">
                                <a class="button radius" href="all-video.html">View All Video</a>
                            </div>
                        </div>
                    </div>
                    <!-- ad Section -->
                    <div class="googleAdv">
                        <a href="#"><img src="images/goodleadv.png" alt="googel ads"></a>
                    </div><!-- End ad Section -->
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
                                            <img src="images/video-thumbnail/7.jpg" alt="most viewed videos">
                                            <a href="#" class="hover-posts">
                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                            </a>
                                        </div>
                                        <div class="video-box-content">
                                            <h6><a href="#">There are many variations of passage. </a></h6>
                                            <p>
                                                <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="video-box thumb-border">
                                        <div class="video-img-thumb">
                                            <img src="images/widget-most1.png" alt="most viewed videos">
                                            <a href="#" class="hover-posts">
                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                            </a>
                                        </div>
                                        <div class="video-box-content">
                                            <h6><a href="#">There are many variations of passage. </a></h6>
                                            <p>
                                                <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="video-box thumb-border">
                                        <div class="video-img-thumb">
                                            <img src="images/widget-most2.png" alt="most viewed videos">
                                            <a href="#" class="hover-posts">
                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                            </a>
                                        </div>
                                        <div class="video-box-content">
                                            <h6><a href="#">There are many variations of passage. </a></h6>
                                            <p>
                                                <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="video-box thumb-border">
                                        <div class="video-img-thumb">
                                            <img src="images/widget-most3.png" alt="most viewed videos">
                                            <a href="#" class="hover-posts">
                                                <span><i class="fa fa-play"></i>Watch Video</span>
                                            </a>
                                        </div>
                                        <div class="video-box-content">
                                            <h6><a href="#">There are many variations of passage. </a></h6>
                                            <p>
                                                <span><i class="fa fa-user"></i><a href="#">admin</a></span>
                                                <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                                <span><i class="fa fa-eye"></i>1,862K</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end most view Widget -->

                        <!-- social Fans Widget -->
                        <div class="large-12 medium-7 medium-centered columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>social fans</h5>
                                </div>
                                <div class="widgetContent">
                                    <div class="social-links">
                                        <a class="socialButton" href="#">
                                            <i class="fa fa-facebook"></i>
                                            <span>698K</span>
                                            <span>fans</span>
                                        </a>
                                        <a class="socialButton" href="#">
                                            <i class="fa fa-twitter"></i>
                                            <span>598</span>
                                            <span>followers</span>
                                        </a>
                                        <a class="socialButton" href="#">
                                            <i class="fa fa-google-plus"></i>
                                            <span>98k</span>
                                            <span>followers</span>
                                        </a>
                                        <a class="socialButton" href="#">
                                            <i class="fa fa-youtube"></i>
                                            <span>168k</span>
                                            <span>followers</span>
                                        </a>
                                        <a class="socialButton" href="#">
                                            <i class="fa fa-vimeo"></i>
                                            <span>498</span>
                                            <span>followers</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End social Fans Widget -->

                        <!-- ad banner widget -->
                        <div class="large-12 medium-7 medium-centered columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>Recent post videos</h5>
                                </div>
                                <div class="widgetContent">
                                    <div class="advBanner text-center">
                                        <a href="#"><img src="images/sideradv.png" alt="sidebar adv"></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end ad banner widget -->

                        <!-- Recent post videos -->
                        <div class="large-12 medium-7 medium-centered columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>Recent post videos</h5>
                                </div>
                                <div class="widgetContent">
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section">
                                            <div class="recent-img">
                                                <img src= "images/category/category4.png" alt="recent">
                                                <a href="#" class="hover-posts">
                                                    <span><i class="fa fa-play"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-object-section">
                                            <div class="media-content">
                                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section">
                                            <div class="recent-img">
                                                <img src= "images/category/category2.png" alt="recent">
                                                <a href="#" class="hover-posts">
                                                    <span><i class="fa fa-play"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-object-section">
                                            <div class="media-content">
                                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section">
                                            <div class="recent-img">
                                                <img src= "images/sidebar-recent1.png" alt="recent">
                                                <a href="#" class="hover-posts">
                                                    <span><i class="fa fa-play"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-object-section">
                                            <div class="media-content">
                                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-object stack-for-small">
                                        <div class="media-object-section">
                                            <div class="recent-img">
                                                <img src= "images/sidebar-recent2.png" alt="recent">
                                                <a href="#" class="hover-posts">
                                                    <span><i class="fa fa-play"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="media-object-section">
                                            <div class="media-content">
                                                <h6><a href="#">The lorem Ipsumbeen the industry's standard.</a></h6>
                                                <p><i class="fa fa-user"></i><span>admin</span><i class="fa fa-clock-o"></i><span>5 january 16</span></p>
                                            </div>
                                        </div>
                                    </div>
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
                                    <a href="#">3D Videos</a>
                                    <a href="#">Videos</a>
                                    <a href="#">HD</a>
                                    <a href="#">Movies</a>
                                    <a href="#">Sports</a>
                                    <a href="#">3D</a>
                                    <a href="#">Movies</a>
                                    <a href="#">Animation</a>
                                    <a href="#">HD</a>
                                    <a href="#">Music</a>
                                    <a href="#">Recreation</a>
                                </div>
                            </div>
                        </div><!-- End tags -->
                    </div>
                </aside>
            </div><!-- end sidebar -->
        </div>
    </section>
@endsection
