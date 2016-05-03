<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostCategory;
use App\Http\Requests;
use Auth;
use DB;

class PostCategoryController extends Controller{

    public function index(){
        $items 	= PostCategory::orderBy('pc_display_order')->get();
        return view('admin.post.category.index')->withTitle('DevTv - Post Categories')->withCategory($items);
    }

    /**
     * @param Request $request
     *
     */
    public function store(Request $request){
        $this->validate($request, [
            'category_name' => 'required|max:255'
        ]);

        $category_name = $request->input('category_name');
        PostCategory::create([
            'pc_category_name' => $category_name,
            'pc_category_slug' => str_slug($category_name),
            'pc_created_by' => Auth::User()->id,
            'pc_edited_by' => Auth::User()->id,
            'pc_parent_id' => 0,
            'pc_display_order' => PostCategory::max('pc_display_order') + 1
        ]);

        return redirect()->back();
    }

    public function edit($category_id){
        $category = PostCategory::find($category_id);
        return json_encode(array('category_name' => $category->pc_category_name, 'category_id' => $category->pc_id));
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $this->validate($request, [
            'category_name_edit' => 'required|max:255'
        ], [], array('category_name_edit' => 'Category Name'));

        $category = PostCategory::findOrFail($request->input('category_id'));
        $category->pc_category_name = $request->input('category_name_edit');
        $category->pc_edited_by = Auth::user()->id;
        $category->save();

        return redirect()->back();
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id){
        PostCategory::where('pc_parent_id', $category_id)->get()->each(function($item) {
            $item->pc_parent_id = 0;
            $item->save();
        });
        $category = PostCategory::findOrFail($category_id);
        $category->delete();

        return redirect()->back();
    }


    /**
     *  AJAX Reordering function
     * @param Request $request
     */
    public function order(Request $request){
        $order = $request->input('order');
        if(isset($order)){

            $categories = PostCategory::where('pc_parent_id', '=', '0')->get(array('pc_id', 'pc_parent_id', 'pc_display_order'));

            $to_db = $this->computeChangeApp($categories, $order);

            if (count($to_db) > 0){
                //echo $this->queryBuilder($to_db);
                DB::update($this->queryBuilder($to_db));
            }
        }
    }

    /*
     * Function to create id =>[ order , parent] unnested array
     */
    private function run_array_parent_from_db($array, $parent){
        $post_db = array();
        foreach($array as $head => $body){
            if(isset($body['children'])){
                $head++;
                $post_db[$body['id']] = ['parent'=>$parent,'order'=>$head];
                $post_db = $post_db + $this->run_array_parent_from_db($body['children'],$body['id']);
            }else{
                $head++;
                $post_db[$body['id']] = ['parent'=>$parent,'order'=>$head];
            }
        }
        return $post_db;
    }


    /*
     * Function to create id =>[ order , parent] nested array
     */
    private function run_array_parent_from_app($categories){
        $from_db = array();

        foreach($categories as $category){
            $from_db[$category->pc_id] = ['parent' => $category->pc_parent_id, 'order'=> $category->pc_display_order];
        }

        return $from_db;
    }


    /*
     * Comparing the arrays and adding changed values to $to_db
     */
    private function computeChangeApp($categories, $order){

        $from_db = $this->run_array_parent_from_app($categories);
        $post_db = $this->run_array_parent_from_db(json_decode($order, true),'0');

        $to_db =array();
        foreach($post_db as $key => $value){
            if( !array_key_exists($key, $from_db) ||
                ($from_db[$key]['parent'] != $value['parent']) ||
                ($from_db[$key]['order'] != $value['order'])){
                $to_db[$key] = $value;
            }
        }

        return $to_db;
    }


    /*
     * Build Query to update post category order
     */
    private function queryBuilder($toDB){
        $query = "UPDATE post_category_tbl";
        $query_parent = " SET pc_parent_id = CASE pc_id";
        $query_order = " pc_display_order = CASE pc_id";
        $query_ids = " WHERE pc_id IN (". implode(", ",array_keys($toDB)) . ")";

        foreach ($toDB as $id => $value){
            $query_parent .= " WHEN " . $id . " THEN ". $value['parent'];
            $query_order .= " WHEN " . $id . " THEN ". $value['order'];
        }
        $query_parent .= " END,";
        $query_order .= " END";

        return $query. $query_parent . $query_order . $query_ids;
    }

}
