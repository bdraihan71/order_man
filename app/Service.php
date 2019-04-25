<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function vendors(){
        return $this->hasMany('App\Vendor');
    }
}
