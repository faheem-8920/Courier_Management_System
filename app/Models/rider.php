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

protected $casts = [
    'DateOfBirth' => 'date',
    'HireDate' => 'date',
];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function location()
{
    return $this->hasOne(RiderLocation::class);
}
public function shipments()
{
    return $this->hasMany(Shipment::class, 'AssignedRiderId', 'UserId');
}


}
