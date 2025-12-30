<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{

public function rider()
{
    return $this->belongsTo(User::class, 'AssignedRiderId');
}
    
}
