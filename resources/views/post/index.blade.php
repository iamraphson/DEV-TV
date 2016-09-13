@extends('layouts.master')

@section('content')
    <section class="category-content" style="margin: 20px auto">
        <div class="row">
            @if(isset($title))
                <h3 style="margin-bottom: 20px;">Posts - {{ $title }}</h3>
            @endif
            <!-- left side content area -->
            <div class="large-8 columns" >
                @if($posts->isEmpty())
                    <div data-abide-error="" class="alert callout" style="display: block;">
                        <p><i class="fa fa-exclamation-triangle"></i> No Post Yet</p>
                    </div>
                @else
                    @foreach($posts as $post)
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
                                        <p>{!!  str_limit($post->post_content, 150) !!} [..] </p>
                                        <a class="blog-post-btn"
                                           href="{{ url("/blog/" . $post->post_slug) }}">read me</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="blog-post">
                        <div class="row secBg">
                            <div class="pag_closet">
                                {!! $posts->render() !!}
                            </div>
                        </div>
                    </div>
                @endif
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
                                        <input class="input-group-field" type="text" name="search"
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