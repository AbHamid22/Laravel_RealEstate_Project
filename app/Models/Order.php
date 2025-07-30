<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   
    protected $fillable = [
        'customer_id', 'order_date', 'handover_date',
        'total_amount', 'paid_amount', 'discount'
    ];

  
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
    
}
