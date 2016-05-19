<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $featuredVideo = Video::whereFeatured(1)->orderBy('created_at', 'desc')->limit(4)->get();
        $categories = $this->getCategories();
        //print_r($categories);
        return view('welcome')->with('featured', $featuredVideo)->withCategory($categories);;
    }

    private function getCategories(){
        $categories = [];
        $items 	= Category::get();
        foreach($items as $item){
            array_add($categories, $item->cat_id, $item->category_name);
        }
        print_r($categories);
        return $categories;
    }
}
