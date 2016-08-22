<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'videos_tbl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'video_id';

    public function user(){
        return $this->belongsTo('App\User', 'created_by');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_video_tbl', 'video_id', 'user_id')
            ->withPivot('operation_type');
    }
}
