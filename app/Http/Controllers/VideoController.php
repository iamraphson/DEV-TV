<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Category;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input as Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller{

    public function create(){
        $items 	= Category::get(array('category_name', 'cat_id'));
        return view('admin.video.new')->withTitle('DevTv - Add New Video')->withCategories($items);
    }

    public function uploadFiles(Request $request){
        $validator = Validator::make($request->all(), [
            'file' => 'mimes:video/mp4,video/ogg,video/webm,video/x-msvideo,video/x-flv|between:1,11000'
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => 'Invalid Video File',
                'message' => $validator->messages()->first(),
                'code' => 400
            ], 400);

        }

        if($request->ajax()) { // Becuase you are uploading with ajax / dropzone
            $file = Input::file('file');
            return response()->json(['request' => print_r($_FILES)]);
            /*$destinationPath = public_path() . '/uploads/';
            $filename = $file->getClientOriginalName();
            $upload_success = Input::file('file')->move($destinationPath, $filename);
            if ($upload_success) {
                return Response::json('success', 200);
            } else {
                return Response::json('error', 400);

            }*/
        }

        //return response()->json(['request' => $request->all()]);
        /*$file = Input::file('file');
        $fileName =Input::file('file')->getClientOriginalName();

        $upload_success = Storage::put(time() . round(microtime(true) * 1000) . '/' . $fileName,  File::get($file));

        if ($upload_success) {
            return Response::json('success', 200);
        } else {
            return Response::json('error', 400);
        }*/

    }
}
