<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'UserId', 'Status', 'TrackingNumber', 'SenderName', 'SenderPhone',
        'SenderEmail', 'ReceiverName', 'ReceiverPhone', 'ReceiverEmail',
        'PickupAddress', 'PickupSlot', 'DeliveryAddress', 'DeliveryZone',
        'DeliveryType', 'ParcelWeight', 'InTransitAt', 'AssignedRiderId',
        'PickedUpAt', 'DeliveredAt'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

 public function rider() {
    return $this->hasOne(Rider::class, 'UserId', 'AssignedRiderId');
}
=======
    //


public function rider()
{
    return $this->belongsTo(User::class, 'AssignedRiderId');
}
    

>>>>>>> c7cc037dc2a3b0a49e05dccc772f509fab8cc581
}
