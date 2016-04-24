<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Category;
use Auth;
use DB;
use App\Http\Requests;

class CategoryController extends Controller{

    public function index(){
        $items 	= Category::orderBy('display_order')->get();
        return view('admin.category.index')->withTitle('DevTv - Video Categories')->withCategory($items);
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
        Category::create([
            'category_name' => $category_name,
            'category_slug' => str_slug($category_name),
            'created_by' => Auth::User()->id,
            'edited_by' => Auth::User()->id,
            'parent_id' => 0,
            'display_order' => Category::max('display_order') + 1
        ]);

        return redirect()->back();
    }

    /**
     * @param Request $request
     */
    public function order(Request $request){
        $order = $request->input('order');
        if(isset($order)){

            $categories = Category::where('parent_id', '=', '0')->get(array('cat_id', 'parent_id', 'display_order'));

            $to_db = $this->computeChangeApp($categories, $order);

            if (count($to_db) > 0){
                 DB::raw('?',[$this->queryBuilder($to_db)]);
            }
        }
    }

    /*
     * Function to create id =>[ order , parent] unnested array
     */

    private function run_array_parent_from_db($array,$parent){
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
            $from_db[$category->cat_id] = ['parent' => $category->parent_id,'order'=> $category->display_order];
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
     * Build Query
     */
    private function queryBuilder($toDB){
        $query = "UPDATE Categories_tbl";
        $query_parent = " SET parent_id = CASE cat_id";
        $query_order = " display_order = CASE cat_id";
        $query_ids = " WHERE cat_id IN (". implode(", ",array_keys($toDB)) . ")";

        foreach ($toDB as $id => $value){
            $query_parent .= " WHEN " . $id . " THEN ". $value['parent'];
            $query_order .= " WHEN " . $id . " THEN ". $value['order'];
        }
        $query_parent .= " END,";
        $query_order .= " END";

        return $query. $query_parent . $query_order . $query_ids;
    }

}
