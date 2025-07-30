<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties'; 

  
    protected $fillable = [
        'title',
        'description',
        'sqft',
        'bed_room',
        'bath_room',
        'category_id',
        'project_id',
        'price',
        'status',
        'location',
        'photo', 
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
