<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Video;
use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(){
        return view('admin.index')->withTitle('DevTv - Administrator Dashboard')
            ->with('videoCount', self::getVideoCount())->with('postCount', self::getPostCount())
            ->with('userCount', self::getUserCount());
    }

    private function getVideoCount(){
        return Video::count();
    }

    private function getPostCount(){
        return Post::count();
    }

    private function getUserCount(){
        return User::where('role', '=', 'admin')->count();
    }
}
