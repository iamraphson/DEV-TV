<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevTv - Your Online Video Subscription Platform</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/theme.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/mediaelementplayer.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('layerslider/css/layerslider.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.kyco.easyshare.css') }}">
</head>
<body>
    <div class="off-canvas-wrapper">
            <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
                @include('layouts.nav')
                @yield('content')
                <!-- footer -->
                <footer>
                    <div class="row">
                        <div class="large-3 medium-6 columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>About DevTv</h5>
                                </div>
                                <div class="textwidget">
                                    DevTv is your Video Subscription Platform. Add unlimited videos, posts to your subscription site. Earn re-curring revenue and require users to subscribe to access premium content on your website.
                                </div>
                            </div>
                        </div>
                        <div class="large-6 medium-6 columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>Tags</h5>
                                </div>
                                <div class="tagcloud">
                                    <?php $count = 0;?>
                                    @foreach(getAllTags() as $systemTag)
                                        @if($count == 20)  @break; @endif
                                        <a href="{{ url('/video/tag/' . $systemTag) }}">{{ $systemTag }}</a>
                                        <?php $count++; ?>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="large-3 medium-6 columns">
                            <div class="widgetBox">
                                <div class="widgetTitle">
                                    <h5>Subscribe Now</h5>
                                </div>
                                <div class="widgetContent">
                                    <form data-abide novalidate action="{{ url('/register') }}" method="get">
                                        <button class="button" type="submit" value="Submit">Sign up Now</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-double-up"></i></a>
                </footer><!-- footer -->
                <div id="footer-bottom" style="display: none;">
                </div>
            </div><!--end off canvas content-->
        </div><!--end off canvas wrapper inner-->
    </div><!--end off canvas wrapper-->
    <!-- script files -->
    <script src="{{ asset('js/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('js/mediaelement-and-player.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/what-input/what-input.js') }}"></script>
    <script src="{{ asset('js/foundation-sites/dist/foundation.js') }}"></script>
    <script src="{{ asset('js/jquery.showmore.src.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('layerslider/js/greensock.js') }}" type="text/javascript"></script>
    <!-- LayerSlider script files -->
    <script src="{{ asset('layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/inewsticker.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery.kyco.easyshare.js') }}" type="text/javascript"></script>
    @yield('footer')
</body>
</html>