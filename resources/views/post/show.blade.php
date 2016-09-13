@extends('layouts.master')

@section('content')
    <section class="category-content" style="margin: 20px auto">
        <div class="row">
            <!-- left side content area -->
            <div class="large-8 columns">
                <div class="blog-post">
                    <div class="row secBg">
                        <div class="large-12 columns">
                            <div class="blog-post-heading">
                                <h3><a href="{{ url("/blog/" . $post->post_slug) }}">{{ $post->post_title }}</a></h3>
                                <p>
                                    <span><i class="fa fa-clock-o"></i>{{ date('j F y', strtotime($post->created_at)) }}</span>
                                </p>
                            </div>
                            <div class="blog-post-content">
                                <div class="blog-post-img">
                                    <img src="{{ URL::asset($post->post_image_location) }}"
                                         alt="{{ $post->post_title }}">
                                </div>
                                <p>{!! $post->post_content !!}</p>
                                <div class="blog-post-extras">
                                    <div class="categories extras">
                                        <button><i class="fa fa-folder-open"></i>categories</button>
                                        <a href="{{ url('/blog/category/' . $post->postCategory->pc_category_slug) }}">{{ $post->postCategory->pc_category_name }}</a>
                                    </div>
                                    <div class="social-share extras">
                                        <div class="post-like-btn clearfix">
                                            <div class="easy-share" data-easyshare
                                                 data-easyshare-http data-easyshare-url=" {{ Request::url() }}">

                                                <button class="float-left"><i class="fa fa-share-alt"></i>share</button>
                                                <!-- Facebook -->
                                                <button class="removeBorder" data-easyshare-button="facebook">
                                                    <span class="fa fa-facebook"></span>
                                                </button>

                                                <!-- Twitter -->
                                                <button class="removeBorder" data-easyshare-button="twitter" data-easyshare-tweet-text="{{ $post->post_title }}">
                                                    <span class="fa fa-twitter"></span>
                                                </button>

                                                <!-- Google+ -->
                                                <button class="removeBorder" data-easyshare-button="google">
                                                    <span class="fa fa-google-plus"></span>
                                                </button>

                                                <div data-easyshare-loader>Loading...</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end blog post -->

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
                                    <form id="searchform" method="get" action="{{ url("/video/search/all") }}"
                                          role="search">
                                        <div class="input-group">
                                            <input class="input-group-field"  name="search" type="text"
                                                   placeholder="Enter your keyword">
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

                            <!-- categories -->
                            <div class="large-12 medium-7 medium-centered columns">
                                <div class="widgetBox clearfix">
                                    <div class="widgetTitle">
                                        <h5>Categories</h5>
                                    </div>
                                    <div class="widgetContent clearfix">
                                        <ul>
                                            @foreach($category as $cat)
                                                <li class="cat-item"><a href="{{ url('/blog/category/'
                                        . $cat->pc_category_slug) }}">{{ $cat->pc_category_name }}</a></li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            </div>

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
    </section><!-- End Category Content-->
@endsection