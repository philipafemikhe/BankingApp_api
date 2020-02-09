<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected  $fillable = ['user_id', 'product_id', 'quantity', 'amount', 'status', 'created_at', 'updated_at'];

    public function products(){
        return $this->hasMany('App\Product','id','product_id');
    }

    public function user(){
        return $this->belongsTo('App\User','id','user_id');
    }
}
