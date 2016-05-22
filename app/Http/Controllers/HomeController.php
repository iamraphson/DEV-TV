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
        $featuredVideo = $this->getFeaturedVideos();
        $categories = $this->getCategories();
        $count = $this->getTotalVideos();
        $video = $this->getVideos(6);
        $videoside = $this->getVideos(4);

        return view('welcome')->with('featured', $featuredVideo)->withCategory($categories)->withCount($count)
            ->withVideos($video)->with('videos_side', $videoside);
    }

    private function getTotalVideos(){
        return Video::count();
    }


    private function getVideos(int $limit){
        return Video::orderBy('created_at', 'desc')->limit($limit)->get();
    }

    private function getFeaturedVideos(){
        return Video::whereFeatured(1)->orderBy('created_at', 'desc')->limit(4)->get();
    }

    private function getCategories(){
        $categories = [];
        $items 	= Category::get();
        foreach($items as $item){
            $categories[$item->cat_id] =  $item->category_name;
        }
        return $categories;
    }
}
