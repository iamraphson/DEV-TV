<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Video;
use App\Post;
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
        $video = $this->getRecentWithPagination();

        return view('welcome')->with('featured', $featuredVideo)->withCategory($categories)->withCount($count)
            ->withVideos($video);
    }

    public function getAllVideo($queryType){
        /*$tags = $this->getTags();
        $recent = $this->getRecentWithPagination();

        if(strtolower($queryType) == 'all'){
            return view('video.index')->with('tabHeader', 'All Videos')->with('tags', $tags)
                ->with('videos', $recent)->with('videos_side', $this->videoSide);
        } else if(strtolower($queryType) == 'featured') {
            //to be done l8r
        }*/
    }

    private function getTotalVideos(){
        return Video::count();
    }

    private function getRecentWithPagination(){
        return $this->getRecent()->paginate($this->paginationCount);
    }

    private function getRecent(){
        return Video::orderBy('created_at', 'desc');
    }

    private function getRecentVideosWithLimit(int $limit = 4){
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

    private function getRecentBlog(){
        return Post::orderBy('created_at', 'desc');
    }

    private function getRecentBlogWithPagination(){
        return $this->getRecentBlog()->paginate($this->paginationCount);
    }

    public function blogIndex(){
        $posts = $this->getRecentBlogWithPagination();
        return view('post.index')->withPosts($posts);
    }
}
