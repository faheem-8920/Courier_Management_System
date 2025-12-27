<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rider extends Model
{


 protected $fillable = [
        'Fullname', 'Email', 'Phone', 'DateOfBirth', 'HireDate', 'WorkingShift',
        'WorkingZone', 'VehicleType', 'PlateNumber', 'VehicleModel',
        'AdminNotes', 'VehicleInspected', 'TermsAccepted', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


}
