<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $guarded = [];
    public function location(){
      return $this->belongsTo('App\Location');
    }
}
