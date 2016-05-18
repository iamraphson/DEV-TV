<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    public  $table = 'subscription_tbl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'subscription_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'comment', 'payment_desc', 'payment_method', 'amount', 'discount', 'total_amt', 'transaction_id',
        'purchase_time', 'started_time', 'end_time', 'doneby'];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

}