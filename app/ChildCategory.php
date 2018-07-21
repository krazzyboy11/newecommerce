<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChildCategory extends Model
{
    public function subcategory(){
        return $this->belongsTo('App\SubCategory','sub_category_id','id');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }

}
