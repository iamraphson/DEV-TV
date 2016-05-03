<?php

namespace App\Http\Controllers;

use App\PostCategory;
use Illuminate\Http\Request;

use App\Http\Requests;

class PostController extends Controller{
    public function create(){
        $items 	= PostCategory::get(array('pc_category_name', 'pc_id'));
        return view('admin.post.new')->withTitle('DevTv - Add New Post')->withCategories($items);
    }

    public function store(Request $request){

    }
}
