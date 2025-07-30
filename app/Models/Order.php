<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Optional: allow mass assignment
    protected $fillable = [
        'customer_id', 'order_date', 'handover_date',
        'total_amount', 'paid_amount', 'discount'
    ];

    // Each order belongs to a customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
}
