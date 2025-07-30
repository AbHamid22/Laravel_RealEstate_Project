<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Customer extends Model{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo'
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
?>
