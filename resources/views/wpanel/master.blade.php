<!DOCTYPE html>
<html>
<head lang="ru">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="{{ asset('wpanel/js/plugins.js') }}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="{{ asset('wpanel/js/app.js') }}"></script>
    @yield('head')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('wpanel/css/main.css') }}">
</head>
<body class="with-side-menu dark-theme dark-theme-green">

<header class="site-header">
    <div class="container-fluid">
        <a href="{{ url('/admin') }}" class="site-logo-text logo">
                <span class="l">D</span>ev<span class="l">T</span>v
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            @if(Auth::user()->avatar_url)
                                <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}">
                            @else
                                <div class="profile__image1" style="background: url('') #D8D8D8 center/cover;">
                                    <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" target="_blank" href="{{ url('/') }}">
                                <span class="font-icon glyphicon glyphicon-globe"></span>Vist Website
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" target="_blank" href="{{ route('account.user') }}">
                                <span class="font-icon glyphicon glyphicon-user"></span>Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <span class="font-icon glyphicon glyphicon-log-out"></span>Logout
                            </a>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>

            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->

<div class="mobile-menu-left-overlay"></div>
@include('wpanel.nav')

<div class="page-content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div><!--.page-content-->

<!--Progress bar-->
{{--<div class="circle-progress-bar pieProgress" role="progressbar" data-goal="100" data-barcolor="#ac6bec" data-barsize="10" aria-valuemin="0" aria-valuemax="100">
<span class="pie_progress__number">0%</span>
</div>--}}
@yield('footer')
</body>
</html>