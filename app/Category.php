<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    function categories(){
    	return $this->hasMany('App\Category','parent_id');
    }
    //Product  relation with category view product
    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    //Relationshil for fetch category
    public function childs() {
        return $this->hasMany('App\Category','parent_id','id') ;
    }
}
