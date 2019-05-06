<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];


    public function vendors(){
        return $this->hasMany('App\Vendor');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
