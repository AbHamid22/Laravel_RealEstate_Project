<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    // Optional: allow mass assignment
    protected $fillable = [
        'order_id', 'property_id', 'flat_no', 'amount'
    ];

    // Enable automatic timestamps (default is true)
    public $timestamps = true;

    // Relationships

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
