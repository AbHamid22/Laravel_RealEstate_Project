<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class MoneyReceipt extends Model{

// app/Models/MoneyReceipt.php
public function customer() {
    return $this->belongsTo(Customer::class);
}

public function details() {
    return $this->hasMany(MoneyReceiptDetail::class, 'money_receipt_id');
}

}


?>
