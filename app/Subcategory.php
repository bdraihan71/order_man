<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }
}
                