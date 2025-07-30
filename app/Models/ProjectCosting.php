<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectCosting extends Model
{
    
    protected $table = 'project_costings';

  
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


    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
