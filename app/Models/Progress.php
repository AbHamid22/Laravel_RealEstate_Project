<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    
    public $timestamps = true;

   
    protected $fillable = [
        'module_id',
        'project_id',
        'percent',
        'review',
        'status_id',
        'updated_by',
        'expected_completion_date',
        'actual_completion_date',
        'remarks',
    ];

    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
      public function status()
    {
        return $this->belongsTo(ProjectStatuse::class);
    }
}
