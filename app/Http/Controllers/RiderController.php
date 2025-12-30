<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Shipment;
use Illuminate\Support\Facades\Auth;
class RiderController extends Controller
{
    public function myShipments()
{
    $rider = auth()->user(); // logged-in user

    // Use user's 'zone' to filter shipments
    $shipments = Shipment::where('DeliveryZone', $rider->zone)->get();

    return view('Rider.delivery', compact('shipments'));
}
}
