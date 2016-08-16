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
    <!-- full width Video -->
    <section class="fullwidth-single-video">
        <div class="row">
            <div class="large-12 columns">
                <div class="flex-video widescreen">
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/aiBt44rrslw" allowfullscreen></iframe>
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
                            <div class="media-object-section">
                                <div class="author-img-sec">
                                    <div class="thumbnail author-single-post">
                                        <a href="#"><img src= "images/post-author-post.png" alt="post"></a>
                                    </div>
                                    <p class="text-center"><a href="#">Joseph John</a></p>
                                </div>
                            </div>
                            <div class="media-object-section object-second">
                                <div class="author-des clearfix">
                                    <div class="post-title">
                                        <h4>There are many variations of passage.</h4>
                                        <p>
                                            <span><i class="fa fa-clock-o"></i>5 January 16</span>
                                            <span><i class="fa fa-eye"></i>1,862K</span>
                                            <span><i class="fa fa-thumbs-o-up"></i>1,862</span>
                                            <span><i class="fa fa-thumbs-o-down"></i>180</span>
                                            <span><i class="fa fa-commenting"></i>8</span>
                                        </p>
                                    </div>
                                    <div class="subscribe">
                                        <form method="post">
                                            <button type="submit" name="subscribe">Subscribe</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="social-share">
                                    <div class="post-like-btn clearfix">
                                        <form method="post">
                                            <button type="submit" name="fav"><i class="fa fa-heart"></i>Add to</button>
                                        </form>
                                        <a href="#" class="secondary-button"><i class="fa fa-thumbs-o-up"></i></a>
                                        <a href="#" class="secondary-button"><i class="fa fa-thumbs-o-down"></i></a>

                                        <div class="float-right easy-share" data-easyshare data-easyshare-http data-easyshare-url="http://joinwebs.com/">
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
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>

                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur</p>
                            <h6>Bullets List :</h6>
                            <ul>
                                <li>Sed ut perspiciatis unde omnis</li>
                                <li>But I must explain to you how</li>
                                <li>At vero eos et accusamus et iusto</li>
                                <li>On the other hand, we denounce</li>
                                <li>There are many variations of passages</li>
                            </ul>
                            <div class="categories">
                                <button><i class="fa fa-folder"></i>Categories</button>
                                <a href="#" class="inner-btn">entertainment</a>
                                <a href="#" class="inner-btn">comedy</a>
                            </div>
                            <div class="tags">
                                <button><i class="fa fa-tags"></i>Tags</button>
                                <a href="#" class="inner-btn">3D Videos</a>
                                <a href="#" class="inner-btn">Videos</a>
                                <a href="#" class="inner-btn">HD</a>
                                <a href="#" class="inner-btn">Movies</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- End single post description -->

            <!-- related Posts -->
            <section class="content content-with-sidebar related">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="main-heading borderBottom">
                            <div class="row padding-14">
                                <div class="medium-12 small-12 columns">
                                    <div class="head-title">
                                        <i class="fa fa-film"></i>
                                        <h4>Related Videos</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row list-group">
                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/landing/landing-small1.png" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/landing/landing-small2.png" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/landing/landing-small3.png" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/widget-most2.png" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/slider-carousel4.png" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item large-4 columns end group-item-grid-default">
                                <div class="post thumb-border">
                                    <div class="post-thumb">
                                        <img src="images/video-thumbnail/1.jpg" alt="landing">
                                        <a href="#" class="hover-posts">
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
                                        <h6><a href="#">There are many variations of passage.</a></h6>
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
                                            <a href="#" class="secondary-button"><i class="fa fa-play-circle"></i>watch video</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><!--end related posts-->
            <!-- Comments -->
            <section class="content comments">
                <div class="row secBg">
                    <div class="large-12 columns">
                        <div class="main-heading borderBottom">
                            <div class="row padding-14">
                                <div class="medium-12 small-12 columns">
                                    <div class="head-title">
                                        <i class="fa fa-comments"></i>
                                        <h4>Comments <span>(4)</span></h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="comment-box thumb-border">
                            <div class="media-object stack-for-small">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                    <h6><a href="#">Joseph John</a></h6>
                                </div>
                                <div class="media-object-section comment-textarea">
                                    <form method="post">
                                        <textarea name="commentText" placeholder="Add a comment here.."></textarea>
                                        <input type="submit" name="submit" value="send">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="comment-sort text-right">
                            <span>Sort By : <a href="#">newest</a> | <a href="#">oldest</a></span>
                        </div>

                        <!-- main comment -->
                        <div class="main-comment showmore_one">
                            <div class="media-object stack-for-small">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>

                                    <!--sub comment-->
                                    <div class="media-object stack-for-small reply-comment">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/post-author-post.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>
                                        </div>
                                    </div><!-- end sub comment -->

                                    <!--sub comment-->
                                    <div class="media-object stack-for-small reply-comment">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/post-author-post.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>

                                        </div>
                                    </div><!-- end sub comment -->

                                </div>
                            </div>

                            <div class="media-object stack-for-small">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>

                                </div>
                            </div>

                            <div class="media-object stack-for-small">
                                <div class="media-object-section comment-img text-center">
                                    <div class="comment-box-img">
                                        <img src= "images/post-author-post.png" alt="comment">
                                    </div>
                                </div>
                                <div class="media-object-section comment-desc">
                                    <div class="comment-title">
                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                    </div>
                                    <div class="comment-text">
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                    </div>
                                    <div class="comment-btns">
                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                        <span class='reply float-right hide-reply'></span>
                                    </div>
                                    <!--sub comment-->
                                    <div class="media-object stack-for-small reply-comment">
                                        <div class="media-object-section comment-img text-center">
                                            <div class="comment-box-img">
                                                <img src= "images/post-author-post.png" alt="comment">
                                            </div>
                                        </div>
                                        <div class="media-object-section comment-desc">
                                            <div class="comment-title">
                                                <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                            </div>
                                            <div class="comment-text">
                                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                            </div>
                                            <div class="comment-btns">
                                                <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                <span class='reply float-right hide-reply'></span>
                                            </div>
                                            <!--sub comment-->
                                            <div class="media-object stack-for-small reply-comment">
                                                <div class="media-object-section comment-img text-center">
                                                    <div class="comment-box-img">
                                                        <img src= "images/post-author-post.png" alt="comment">
                                                    </div>
                                                </div>
                                                <div class="media-object-section comment-desc">
                                                    <div class="comment-title">
                                                        <span class="name"><a href="#">Joseph John</a> Said:</span>
                                                        <span class="time float-right"><i class="fa fa-clock-o"></i>1 minute ago</span>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventoresunt explicabo.</p>
                                                    </div>
                                                    <div class="comment-btns">
                                                        <span><a href="#"><i class="fa fa-thumbs-o-up"></i></a> | <a href="#"><i class="fa fa-thumbs-o-down"></i></a></span>
                                                        <span><a href="#"><i class="fa fa-share"></i>Reply</a></span>
                                                        <span class='reply float-right hide-reply'></span>
                                                    </div>
                                                </div>
                                            </div><!-- end sub comment -->
                                        </div>
                                    </div><!-- end sub comment -->
                                </div>
                            </div>
                        </div><!-- End main comment -->

                    </div>
                </div>
            </section><!-- End Comments -->
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

                    <!-- categories -->
                    <div class="large-12 medium-7 medium-centered columns">
                        <div class="widgetBox clearfix">
                            <div class="widgetTitle">
                                <h5>Categories</h5>
                            </div>
                            <div class="widgetContent clearfix">
                                <ul>
                                    <li class="cat-item"><a href="#">Entertainment &nbsp; (6)</a></li>
                                    <li class="cat-item"><a href="#">Historical &amp; Archival &nbsp;(8)</a></li>
                                    <li class="cat-item"><a href="#">Technology&nbsp;(4)</a></li>
                                    <li class="cat-item"><a href="#">People&nbsp;(3)</a></li>
                                    <li class="cat-item"><a href="#">Fashion &amp; Beauty&nbsp;(2)</a></li>
                                    <li class="cat-item"><a href="#">Nature&nbsp;(1)</a></li>
                                    <li class="cat-item"><a href="#">Automotive&nbsp;(5)</a></li>
                                    <li class="cat-item"><a href="#">Foods &amp; Drinks&nbsp;(5)</a></li>
                                    <li class="cat-item"><a href="#">Foods &amp; Drinks&nbsp;(10)</a></li>
                                    <li class="cat-item"><a href="#">Animals&nbsp;(12)</a></li>
                                    <li class="cat-item"><a href="#">Sports &amp; Recreation&nbsp;(14)</a></li>
                                    <li class="cat-item"><a href="#">Places &amp; Landmarks&nbsp;(16)</a></li>
                                    <li class="cat-item"><a href="#">Places &amp; Landmarks&nbsp;(1)</a></li>
                                    <li class="cat-item"><a href="#">Travel&nbsp;(2)</a></li>
                                    <li class="cat-item"><a href="#">Transportation&nbsp;(3)</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

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
@endsection
