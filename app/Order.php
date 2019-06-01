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

    public function bookedBy()
    {
        return $this->belongsTo('App\User', 'booked_by');
    }

    public function actionBy()
    {
        return $this->belongsTo('App\User', 'action_by');
    }
}
