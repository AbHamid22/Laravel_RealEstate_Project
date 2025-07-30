<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Invoice extends Model {
    protected $table = "invoices";

    protected $fillable = [
        'invoice_no',
        'customer_id',
        'invoice_date',
        'due_date',
        'total_amount',
        'discount',
        'net_amount',
        'paid_amount',
        'due_amount',
        'status'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
?>
