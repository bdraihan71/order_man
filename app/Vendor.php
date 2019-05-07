<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    public function services(){
        return $this->hasMany('App\Service');
    }
}
