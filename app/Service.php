<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];

    public function getPriceAttribute($value)
    {
        return $value/100;
    }

    public function setPriceAttribute()
    {
        $this->attributes['price'] = $value * 100;
    }

    public function getMinPriceAttribute($value)
    {
        return $value/100;
    }

    public function setMinPriceAttribute()
    {
        $this->attributes['min_price'] = $value * 100;
    }

    public function getMaxPriceAttribute($value)
    {
        return $value/100;
    }

    public function setMaxPriceAttribute($value)
    {
        $this->attributes['max_price'] = $value * 100;
    }

    public function vendors()
    {
        return $this->hasMany('App\Vendor');
    }

    public function orders()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcategory');
    }
}
