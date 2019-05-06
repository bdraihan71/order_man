<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}