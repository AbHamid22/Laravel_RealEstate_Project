<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{


    protected $fillable = [
        'photo',
        'name',
        'type_id',
        'status_id',
        'start_date',
        'end_date',
        'contractor_id',
    ];

    public function projectPersons()
    {
        return $this->hasMany(ProjectPerson::class, 'project_id');
    }


    public function type()
    {
        return $this->belongsTo(ProjectType::class, 'type_id');
    }

    public function status()
    {
        return $this->belongsTo(ProjectStatuse::class, 'status_id');
    }

    public function contractor()
    {
        return $this->belongsTo(Contractor::class, 'contractor_id');
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
