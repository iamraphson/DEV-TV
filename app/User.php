<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_tbl';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password', 'role', 'provider_id', 'avatar_url', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Check if Avatar field is null
     * @return model avatar
     */
    public function getAvatar()
    {
        if (is_null($this->avatar))
            return "http://www.gravatar.com/avatar/" . md5(strtolower(trim($this->email))) . "?d=mm&s=60";
    }

    public function getRole(){
        return $this->role;
    }

    public function hasRole($role)
    {
        if (is_array($role)) {
            return in_array($this->attributes['role'], $role);
        }
        return $this->attributes['role'] == $role;
    }

    public function videos(){
        return $this->hasMany('App\Video', 'created_by');
    }

    public function categories(){
        return $this->hasMany('App\Category', 'created_by');
    }

    public function postCategories(){
        return $this->hasMany('App\PostCategory', 'pc_created_by');
    }


    public function posts(){
        return $this->hasMany('App\Post', 'created_by');
    }

    public function subscriptions(){
        return $this->hasMany('App\Subscription', 'user_id');
    }

    /**
     * The videos that belong to the user.
     */
    public function seenVideos(){
        return $this->belongsToMany('App\Video', 'user_video_tbl', 'user_id', 'video_id')
            ->withPivot('operation_type');
    }
}

