<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'invoice_id',
        'project_id',
        'property_id',
        'amount',
        'discount',
        'subtotal'
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
