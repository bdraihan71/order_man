<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];


    public function vendors(){
        return $this->hasMany('App\Vendor');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
