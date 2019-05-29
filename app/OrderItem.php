<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function vendor()
    {
        return $this->belongsTo('App\Vendor');
    }

    public function bookedBy()
    {
        return $this->belongsTo('App\User', 'booked_by');
    }

    public function cancelledBy()
    {
        return $this->belongsTo('App\User', 'cancelled_by');
    }

    public function fullfilledBy()
    {
        return $this->belongsTo('App\User', 'fullfilled_by');
    }

    public function reference()
    {
        return $this->belongsTo('App\Reference', 'reference_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\User', 'category_manager');
    }
}
