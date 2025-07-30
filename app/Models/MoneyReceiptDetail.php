<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoneyReceiptDetail extends Model
{
    public $timestamps=false;
    
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function receipt()
    {
        return $this->belongsTo(MoneyReceipt::class, 'money_receipt_id');
    }
}
