<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'properties'; // Optional if you use Laravel conventions

    // Fillable fields to allow mass assignment safely
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
        'photo',  // for image filename
    ];

    // Relationship: Property belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship: Property belongs to Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
}
