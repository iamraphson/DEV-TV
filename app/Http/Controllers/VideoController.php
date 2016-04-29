<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use AWS;

class VideoController extends Controller{

    public function create(){
        $items 	= Category::get(array('category_name', 'cat_id'));
        return view('admin.video.new')->withTitle('DevTv - Add New Video')->withCategories($items);
    }

    public function store(Request $request){

        //echo $request->input('featured');
        $niceNames = array(
            'video_title' => 'Video Title',
            'video_desc' => 'Video Description',
            'video_details' => 'Video Details',
            'video_category' => 'Video Category',
            'video_tags' => 'Video Tags',
            'video_duration' => 'Video Duration',
            'video_image' => 'Video Image',
        );

        $this->validate($request, [
            'video_title' => 'required|min:3',
            'video_desc' => 'required|max:255',
            'video_details' => 'required|min:7',
            'video_category' => 'required',
            'video_tags' => 'required',
            'video_image' => 'required|mimes:jpg,jpeg,bmp,png|between:1,7000',
            'video_duration' => ['required', 'regex:/^(?:(?:([01]?\d|2[0-3]):)?([0-5]?\d):)?([0-5]?\d)$/'],
        ], [], $niceNames);


    }
    public function uploadFiles(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'mimetypes:video/avi,video/mp4,video/ogg,video/webm,video/x-msvideo,video/x-flv|max:1048900'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid Video File',
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }


        /*Cloudder::uploadVideo($file, null, null, null);

        $fileUrl = Cloudder::show(Cloudder::getPublicId(), null);
        $fileName = time() . round(microtime(true) * 1000) . '/' . $request->file('file')->getClientOriginalName();

        $upload_success = Storage::put($fileName, File::get($file));*/

        $file = $request->file('file');
        $fileName = time() . '/' . $request->file('file')->getClientOriginalName();

        $status = Storage::disk('s3')->put($fileName, file_get_contents($file));
        $fileUrl = "https://s3-" . env('S3_REGION') . ".amazonaws.com/" . env('S3_BUCKET') . "/" . $fileName;
        if ($status) {
            return response()->json([
                'success' => true,
                'message' => $fileUrl,
                'code' => 200
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Internal Error',
                'code' => 400
            ], 400);
        }

    }
}
