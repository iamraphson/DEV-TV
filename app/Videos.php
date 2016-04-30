<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model{
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

}
