<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCosting extends Model
{
    // If your table name follows Laravel's convention (project_costings), this is not needed
    protected $table = 'project_costings';

    // If you're using mass assignment (e.g., $request->all())
    protected $fillable = [
        'project_id',
        'module_id',
        'budget',
        'actual_cost',
        'days',
        'status',
        'remarks',
        'created_by',
        'updated_by',
    ];

    // Relationships
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
