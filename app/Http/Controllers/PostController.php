<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;

class PostController extends Controller{

    public function index(){
        $posts 	= Post::get();
        return view('admin.post.index')->withTitle('DevTv - All Posts')->withPosts($posts);
    }

    public function create(){
        $items 	= PostCategory::get(array('pc_category_name', 'pc_id'));
        return view('admin.post.new')->withTitle('DevTv - Add New Post')->withCategories($items);
    }

    public function store(Request $request){
       $niceNames = array(
            'post_title' => 'Post Title',
            'post_image' => 'Post Featured Image',
            'post_content' => 'Post Content',
            'post_category' => 'Post Category'
        );

        $this->validate($request, [
            'post_title' => 'required|min:3',
            'post_image' => 'required|mimes:jpg,jpeg,bmp,png|between:1,7000',
            'post_content' => 'required',
            'post_category' => 'required',
        ], [], $niceNames);


        //upload post featured image
        $postImage = Input::file('post_image');
        $featuredImageLocation = $this->uploadFeaturedImage($postImage);

        $post = new Post;
        $post->post_title = $request->input('post_title');
        $post->post_image_location = $featuredImageLocation;
        $post->post_slug = ($request->has('post_slug')) ? $request->input('post_slug') :
            str_slug($request->input('post_title'));
        $post->post_content = $request->input('post_content');
        $post->post_category = $request->input('post_category');
        $post->post_access = $request->input('post_access');
        $post->active = $request->input('post_active');
        $post->created_by = Auth::user()->id;
        $post->edited_by = Auth::user()->id;
        $post->save();

        return redirect()->back()->with('info', 'Your Post has been added successfully');
    }

    public function destroy($id){
        $post = Post::findOrFail($id);
        $this->deleteCoverImage($post->post_image_location);
        $post->delete();

        return redirect()->back()->with('info', 'Video deleted successfully');
    }

    private function deleteCoverImage($coverLocation){
        $coverLoc = explode(DIRECTORY_SEPARATOR, $coverLocation);
        unset($coverLoc[3]);
        File::delete(public_path($coverLocation));
        File::deleteDirectory(public_path(implode(DIRECTORY_SEPARATOR, $coverLoc)));
    }

    private function uploadFeaturedImage($featuredImage){
        $uploadPath = DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . time() . DIRECTORY_SEPARATOR;
        $destinationPath = public_path(). $uploadPath;
        $filename = $featuredImage->getClientOriginalName();
        $featuredImage->move($destinationPath, $filename);
        return $uploadPath . $filename;
    }
}
