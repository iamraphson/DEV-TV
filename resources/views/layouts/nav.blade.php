<div class="off-canvas position-left light-off-menu" id="offCanvas-responsive" data-off-canvas>
    <div class="off-menu-close">
        <h3>Menu</h3>
        <span data-toggle="offCanvas-responsive"><i class="fa fa-times"></i></span>
    </div>
    <ul class="vertical menu off-menu" data-responsive-menu="drilldown">
        <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li>
        <li>
            <a href="blog.html"><i class="fa fa-edit"></i>blog</a>
            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
            </ul>
        </li>
    </ul>
    <div class="responsive-search">
        <form method="post">
            <div class="input-group">
                <input class="input-group-field" type="text" placeholder="search Here">
                <div class="input-group-button">
                    <button type="submit" name="search"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
    <div class="top-button">
        <ul class="menu">
            @if(Auth::check())
                @if(Auth::user()->getRole() == 'admin')
                <li>
                    <a href="#">Administrator Portal</a>
                </li>
                @endif
                <li class="dropdown-login">
                    <a href="{{ route('logout') }}">Logout</a>
                </li>
            @else
                <li>
                    <a href="{{ url('register') }}">Register</a>
                </li>
                <li class="dropdown-login">
                    <a href="{{ route('auth.login') }}">Login</a>
                </li>
            @endif
        </ul>
    </div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
    <header>
        <!-- Top -->
        <section id="top" class="topBar show-for-large">
            <div class="row">
                <div class="medium-6 columns">

                </div>
                <div class="medium-6 columns">
                    <div class="top-button">
                        <ul class="menu float-right">
                            @if(Auth::check())
                                @if(Auth::user()->getRole() == 'admin')
                                <li>
                                    <a href="#">Administrator Portal</a>
                                </li>
                                @endif
                                <li class="dropdown-login">
                                    <a href="{{ route('logout') }}">Logout</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('register') }}">Register</a>
                                </li>
                                <li class="dropdown-login">
                                    <a href="{{ route('auth.login') }}">Login</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- End Top -->
        <!--Navber-->
        <section id="navBar">
            <nav class="sticky-container" data-sticky-container>
                <div class="sticky topnav" data-sticky data-top-anchor="navBar" data-btm-anchor="footer-bottom:bottom" data-margin-top="0" data-margin-bottom="0" style="width: 100%; background: #fff;" data-sticky-on="large">
                    <div class="row">
                        <div class="large-12 columns">
                            <div class="title-bar" data-responsive-toggle="beNav" data-hide-for="large">
                                <button class="menu-icon" type="button" data-toggle="offCanvas-responsive"></button>
                                <div class="title-bar-title">DevTv</div>
                            </div>

                            <div class="top-bar show-for-large" id="beNav" style="width: 100%;">
                                <div class="top-bar-left">
                                    <ul class="menu">
                                        <li class="menu-text">
                                            DevTV
                                        </li>
                                    </ul>
                                </div>
                                <div class="top-bar-right search-btn">
                                    <ul class="menu">
                                        <li class="search">
                                            <i class="fa fa-search"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top-bar-right">
                                    <ul class="menu vertical medium-horizontal" data-responsive-menu="drilldown medium-dropdown">
                                        <li><a href="categories.html"><i class="fa fa-th"></i>category</a></li>
                                        <li>
                                            <a href="blog.html"><i class="fa fa-edit"></i>blog</a>
                                            <ul class="submenu menu vertical" data-submenu data-animate="slide-in-down slide-out-up">
                                                <li><a href="blog-single-post.html"><i class="fa fa-edit"></i>blog single post</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="search-bar" class="clearfix search-bar-light">
                        <form method="post">
                            <div class="search-input float-left">
                                <input type="search" name="search" placeholder="Seach Here your video">
                            </div>
                            <div class="search-btn float-right text-right">
                                <button class="button" name="search" type="submit">search now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </nav>
        </section>
    </header><!-- End Header -->