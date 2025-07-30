<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransperDetail extends Model
{
    protected $table = 'stock_transper_details';

        protected $fillable = [
        'transper_id',          
        'product_id',
        'uom_id',
        'qty',                 
        'transaction_type_id',
        'remark',              
     
    ];


    public function transper()
    {
        return $this->belongsTo(StockTransper::class, 'transper_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function uom()
    {
        return $this->belongsTo(Uom::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }
}
