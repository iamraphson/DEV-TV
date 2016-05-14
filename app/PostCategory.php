<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_category_tbl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'pc_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pc_category_name', 'pc_category_slug', 'pc_parent_id', 'pc_created_by', 'pc_edited_by', 'pc_display_order'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'pc_created_by');
    }
}
