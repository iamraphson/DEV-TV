<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Video;
use App\Post;
use App\PostCategory;
use DB;

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

    private function getRecentVideosWithLimit($limit = 4){
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

    private function getMostViewVideo($limit = 3){
        return Video::orderBy('video_views', 'desc')->limit($limit)->get();
    }

    private function getRecentVideos($limit = 3){
        return Video::orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function getTags(){
        $tags = [];
        $items 	= Video::get(['video_tags']);
        foreach($items as $item){
            array_push($tags, $item->video_tags);
        }
        $tagsString = implode(',', $tags);
        return array_unique(explode(',', $tagsString));
    }

    private function getBlogCategories(){
        return  PostCategory::orderBy('pc_display_order')->get();
    }

    public function blogIndex(){
        $posts = $this->getRecentBlogWithPagination();
        return view('post.index')->withPosts($posts)->with("systemTags", self::getTags())
            ->with("mostViewVideos", self::getMostViewVideo())
            ->with("mostRecentVideos", self::getRecentVideos())
            ->withCategory(self::getBlogCategories());
    }

    public function getBlogByCategories($value){
        $posts = DB::table('posts_tbl')
            ->join('post_category_tbl', 'posts_tbl.post_category', '=', 'post_category_tbl.pc_id')
            ->where("pc_category_slug", '=', $value)
            ->paginate($this->paginationCount);

        return view('post.index')->withPosts($posts)->with("systemTags", self::getTags())
            ->with("mostViewVideos", self::getMostViewVideo())
            ->with("mostRecentVideos", self::getRecentVideos())
            ->withCategory(self::getBlogCategories())->withTitle($posts[0]->pc_category_name);
    }

    public function blogShow($blogSlug){
        $post = Post::where('post_slug', '=', $blogSlug)->get();
        return view('post.show')->with("systemTags", self::getTags())
            ->with("mostViewVideos", self::getMostViewVideo())
            ->with("mostRecentVideos", self::getRecentVideos())
            ->withCategory(self::getBlogCategories())->withPost($post[0]);
    }
}
