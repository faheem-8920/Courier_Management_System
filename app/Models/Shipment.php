<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'UserId',
        'Status',
        'TrackingNumber',
        'SenderName',
        'SenderPhone',
        'SenderEmail',
        'ReceiverName',
        'ReceiverPhone',
        'ReceiverEmail',
        'PickupAddress',
        'PickupSlot',
        'DeliveryAddress',
        'DeliveryZone',
        'DeliveryType',
        'ParcelWeight',
        'InTransitAt',
        'AssignedRiderId',
        'PickedUpAt',
        'DeliveredAt'
    ];

    /**
     * Shipment belongs to a customer (user)
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    /**
     * Shipment is assigned to a rider (also a user)
     */
    public function rider()
    {
        return $this->belongsTo(User::class, 'AssignedRiderId');
    }
}

