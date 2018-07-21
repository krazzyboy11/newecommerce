<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function brand(){
        return $this->belongsTo('App\Brand');
    }
    public function childcategory(){
        return $this->belongsTo('App\ChildCategory','child_category_id','id');
    }
}
