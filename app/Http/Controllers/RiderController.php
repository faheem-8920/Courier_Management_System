<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\Shipment;

use Illuminate\Support\Facades\Auth;

use App\Models\rider;
use App\Mail\ParcelDeliveredMail;


class RiderController extends Controller
{
    public function myShipments()
{
    $rider = auth()->user(); // logged-in user

    // Use user's 'zone' to filter shipments
    $shipments = Shipment::where('DeliveryZone', $rider->zone)->get();

    return view('Rider.delivery', compact('shipments'));
}


public function acceptorder($id)
    {
        $order = Shipment::where('id', $id)
            ->where('status', 'pending')
            ->first();

        if (!$order) {
            return back()->with('error', 'Order already taken');
        }

        $order->AssignedRiderId = auth()->id();
        $order->status = 'PickedUp';
        $order->PickedUpAt = now();
        $order->save();

        return back()->with('success', 'Order accepted successfully');
    }

    // 🟡 IN TRANSIT
    public function transitorder($id)
    {
        $order = Shipment::where('id', $id)
            ->where('AssignedRiderId', auth()->id())
            ->where('status', 'PickedUp')
            ->firstOrFail();
$order->status = 'InTransit';
$order->InTransitAt = now();
$order->save();


        return back()->with('success', 'Order is now in transit');
    }

    // 🔵 DELIVERED
    public function deliveredorder($id)
{
    $order = Shipment::where('id', $id)
        ->where('AssignedRiderId', auth()->id())
        ->where('status', 'InTransit')
        ->firstOrFail();

    $order->status = 'Delivered';
    $order->DeliveredAt = now();
    $order->save();

    // Send detailed email to sender
    Mail::to($order->SenderEmail)->send(new ParcelDeliveredMail($order));

    return back()->with('success', 'Order delivered successfully and sender has been notified.');
}

public function showriderdetails($id)
{
    $rider = Rider::findOrFail($id);

    // IMPORTANT: use UserId, not rider id
    $userId = $rider->UserId;

     $shipments = Shipment::where('AssignedRiderId', $userId)
        ->orderBy('created_at', 'desc')
        ->get();


    $pending = Shipment::where('AssignedRiderId', $userId)
        ->where('Status', 'Pending')->count();

    $pickedUp = Shipment::where('AssignedRiderId', $userId)
        ->where('Status', 'PickedUp')->count();

    $inTransit = Shipment::where('AssignedRiderId', $userId)
        ->where('Status', 'InTransit')->count();

    $delivered = Shipment::where('AssignedRiderId', $userId)
        ->where('Status', 'Delivered')->count();

        $todayDeliveries = Shipment::where('AssignedRiderId', $rider->UserId)
    ->whereDate('DeliveredAt', today())
    ->count();

$monthDeliveries = Shipment::where('AssignedRiderId', $rider->UserId)
    ->whereMonth('DeliveredAt', now()->month)
    ->whereYear('DeliveredAt', now()->year)
    ->count();

$totalShipments = $shipments->count();
$performance = $totalShipments > 0
    ? round(($delivered / $totalShipments) * 100)
    : 0;
    

   

    return view('admin.RiderDetails', compact(
        'rider',
        'pending',
        'pickedUp',
        'inTransit',
        'delivered',
        'todayDeliveries',
        'monthDeliveries',
        'totalShipments',
        'shipments',
        'performance',
    ));
}





}

  
