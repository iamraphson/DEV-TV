<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts_tbl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'post_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title', 'post_image_location', 'post_slug', 'post_content', 'post_category',
        'created_by', 'edited_by', 'active'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function postCategory(){
        return $this->hasOne('App\PostCategory', 'pc_id');
    }


}
