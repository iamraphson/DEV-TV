<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use App\Http\Requests;

class VideoController extends Controller{

    public function create(){
        $items 	= Category::get(array('category_name', 'cat_id'));
        return view('admin.video.new')->withTitle('DevTv - Add New Video')->withCategories($items);
    }
}
