<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller{

    protected $paginationCount = null;
    protected $videoSide = null;

    public function  __construct(){
        $this->paginationCount = 6;
        $this->videoSide = $this->getRecentVideosWithLimit(4);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $featuredVideo = $this->getFeaturedVideos();
        $categories = $this->getCategories();
        $count = $this->getTotalVideos();
        $video = $this->getRecentVideosWithLimit(6);
        $tags = $this->getTags();

        return view('welcome')->with('featured', $featuredVideo)->withCategory($categories)->withCount($count)
            ->withVideos($video)->with('videos_side', $this->videoSide)->with('tags', $tags);
    }

    public function getAllVideo($queryType){
        $tags = $this->getTags();
        $recent = $this->getRecentWithPagination();
        $videoside = $this->getRecentVideosWithLimit(4);
        if(strtolower($queryType) == 'all'){
            return view('video.index')->with('tabHeader', 'All Videos')->with('tags', $tags)->with('videos', $recent)
                ->with('videos_side', $this->videoSide);
        } else if(strtolower($queryType) == 'featured') {
            //to be done l8r
        }
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
        return array_unique(explode(',', $tagsString));
    }

    private function getRecentWithPagination(){
        return $this->getRecent()->paginate($this->paginationCount);
    }

    private function getRecent(){
        return Video::orderBy('created_at', 'desc');
    }
    private function getRecentVideosWithLimit(int $limit){
        return $this->getRecent()->limit($limit)->get();
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
