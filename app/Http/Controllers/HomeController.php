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
        $tags = $this->getTags();

        return view('welcome')->with('featured', $featuredVideo)->withCategory($categories)->withCount($count)
            ->withVideos($video)->with('videos_side', $videoside)->with('tags', $tags);
    }

    private function getTotalVideos(){
        return Video::count();
    }

    private function getTags(){
        $tags = [];
        $items 	= Video::get(['video_tags']);
        foreach($items as $item){
            array_push($tags, $item->video_tags);
        }
        $tagsString = implode(',', $tags);
        $tags = explode(',', $tagsString);
        return array_unique($tags);
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
