<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
                