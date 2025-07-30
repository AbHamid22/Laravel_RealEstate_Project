<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status_id',
        'start_date',
        'end_date',
        'contractor_id',
        'budget',
        'totat_cost',
        'photo',
    ];

    public function status()
    {
        return $this->belongsTo(PropertyStatus::class, 'status_id');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class);
    }
}
