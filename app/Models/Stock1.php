<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'product_id',
        'qty',
        'transaction_type_id',
        'remark',
        'warehouse_id',
        'created_at'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function transactionType() {
        return $this->belongsTo(TransactionType::class);
    }

    public function warehouse() {
        return $this->belongsTo(Warehouse::class);
    }
}
