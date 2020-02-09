<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected  $fillable = ['name', 'description', 'category', 'price', 'quantity', 'image1', 'image2', 'image3', 'image4', 'created_at', 'updated_at'];

    public function cart(){
        return $this->belongsTo('App\Cart','product_id','id');
    }
}
