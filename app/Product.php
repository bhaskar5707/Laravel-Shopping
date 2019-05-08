<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes(){
    	return $this->hasMany('App\ProductsAttribute','product_id');
    }

    //Product  relation with category view product
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
