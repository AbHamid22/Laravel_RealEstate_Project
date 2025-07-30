<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyStatus extends Model
{
    protected $table = 'property_statuses'; // Optional if table name follows convention

    protected $fillable = [
        'name',
    ];

    public $timestamps = true; // Explicitly enable timestamps (optional)
}
