<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 5/10/16
 * Time: 21:15
 */
?>
<!-- left sidebar -->
<div class="large-4 columns" style="padding-left: 0px;">
    <aside class="secBg sidebar">
        <div class="row">
            <!-- profile overview -->
            <div class="large-12 columns">
                <div class="widgetBox">
                    <div class="widgetTitle">
                        <h5>Profile Overview</h5>
                    </div>
                    <div class="widgetContent">
                        <ul class="profile-overview">
                            <li class="clearfix">
                                <a href="{{ route('account.user') }}"><i class="fa fa-user"></i>My Favorites</a>
                            </li>
                            <li class="clearfix">
                                <a href="{{ route('account.edit') }}"><i class="fa fa-gears"></i>Profile Setting</a>
                            </li>
                            @if(Auth::user()->role != "admin")
                                <li class="clearfix">
                                    <a href="{{ route('subscribe.user') }}"><i class="fa fa-money"></i>Subscribe</a>
                                </li>
                            @endif
                            <li class="clearfix">
                                <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- End profile overview -->
        </div>
    </aside>
</div><!-- end sidebar -->
