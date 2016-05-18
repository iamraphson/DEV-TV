<?php
/**
 * Created by PhpStorm.
 * User: Raphson
 * Date: 4/19/16
 * Time: 18:52
 */
?>
<nav class="side-menu">
    <ul class="side-menu-list">

        <li class="blue">
            <a href="{{ route('admin.home') }}">
                <i class="font-icon font-icon-dashboard"></i>
                <span class="lbl">Dashboard</span>
            </a>
        </li>

        <li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-editor-video"></i>
                <span class="lbl">Videos</span>
            </span>
            <ul>
                <li><a href="{{ route('video.create') }}"><span class="lbl">Add New Video</span></a></li>
                <li><a href="{{ route('video.index') }}"><span class="lbl">All Videos</span></a></li>
                <li><a href="{{ route('category.home') }}"><span class="lbl">Video Categories</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-post"></i>
                <span class="lbl">Posts</span>
            </span>
            <ul>
                <li><a href="{{ route('post.create') }}"><span class="lbl">Add New Post</span></a></li>
                <li><a href="{{ route('post.index') }}"><span class="lbl">All Posts</span></a></li>
                <li><a href="{{ route('post.category.home') }}"><span class="lbl">Post Categories</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-user"></i>
                <span class="lbl">Users</span>
            </span>
            <ul>
                <li><a href="{{ route('user.create') }}"><span class="lbl">Add New User</span></a></li>
                <li><a href="{{ route('user.index') }}"><span class="lbl">All Users</span></a></li>
            </ul>
        </li>
        <li class="purple with-sub">
            <span>
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">Subscription</span>
            </span>
            <ul>
                <li><a href="{{ route('user.subscription') }}"><span class="lbl">Add Subscription</span></a></li>
                <li><a href="{{ route('user.subscription.index') }}"><span class="lbl">Subscription History</span></a></li>
            </ul>
        </li>


        {{--
            <li class="blue">
                <a href="#">
                    <i class="font-icon font-icon-users"></i>
                    <span class="lbl">Community</span>
                </a>
            </li>
            <li class="purple with-sub">
                    <span>
                        <i class="font-icon font-icon-comments"></i>
                        <span class="lbl">Messages</span>
                    </span>
                <ul>
                    <li><a href="#"><span class="lbl">Inbox</span><span class="label label-custom label-pill label-danger">4</span></a></li>
                    <li><a href="#"><span class="lbl">Sent mail</span></a></li>
                    <li><a href="#"><span class="lbl">Bin</span></a></li>
                </ul>
            </li>
        --}}
    </ul>
</nav><!--.side-menu-->
