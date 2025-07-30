<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockTransper extends Model
{

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
