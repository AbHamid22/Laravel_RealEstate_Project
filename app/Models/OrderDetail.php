<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
  
    protected $fillable = [
        'order_id', 'property_id', 'flat_no', 'amount'
    ];


    public $timestamps = true;

 

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
