<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    // Optional: Define the table name if it's not the plural form "progresses"
    // protected $table = 'progress';

    // Enable automatic timestamps (created_at and updated_at)
    public $timestamps = true;

    // Allow mass assignment for these fields
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

    /**
     * Relationship: A progress entry belongs to a project
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Relationship: A progress entry belongs to a module
     */
    public function module()
    {
        return $this->belongsTo(Module::class);
    }
      public function status()
    {
        return $this->belongsTo(ProjectStatuse::class);
    }
}
