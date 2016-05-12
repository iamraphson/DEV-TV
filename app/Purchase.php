<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'purchases_tbl';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'purchase_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'payment_desc', 'amount', 'stripe_transaction_id'];
}
