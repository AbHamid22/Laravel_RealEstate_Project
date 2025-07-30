<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCosting extends Model
{
    protected $table = 'project_costings'; // Optional if table name is not pluralized
    protected $fillable = [
        'project_id',
        'module_id',
        'budget',
        'actual_cost',
        'days',
    ];

    // Project relationship
    public function project()
    {
        return $this->belongsTo(Project::class);
        // If soft deletes used in Project model:
        // return $this->belongsTo(Project::class)->withTrashed();
    }

    // Module relationship
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
