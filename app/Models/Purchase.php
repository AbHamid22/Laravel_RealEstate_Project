<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Purchase extends Model{
public function vendor()
{
    return $this->belongsTo(Vendor::class);
}

public function warehouse()
{
    return $this->belongsTo(Warehouse::class);
}

public function status()
{
    return $this->belongsTo(Status::class);
}


}
?>
