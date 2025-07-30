<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectPerson extends Model
{
    protected $table = 'project_persons';
    
    protected $fillable = [
        'project_id', 
        'person_id',
        'assign_at'
    ];

    protected $casts = [
        'assign_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}