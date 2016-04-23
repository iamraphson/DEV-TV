<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class CategoryController extends Controller{

    public function index(){
        return view('admin.category.index')->withTitle('DevTv - Video Categories');
    }
}
