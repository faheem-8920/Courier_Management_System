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

public function index()
{
    $shipments = Shipment::where('AssignedRiderId', auth()->id())
                    ->latest()
                    ->get();
   

    return view('Rider.index', compact('shipments'));
    
}

public function pickup()
{
    $pickups = Shipment::where('AssignedRiderId', auth()->id())
                ->where('Status', 'Pickedup')
                ->latest()
                ->get();

    return view('Rider.pickup', compact('pickups'));
}


public function updateLocation(Request $request)
{
    $rider = Rider::where('UserId', auth()->id())->first();

    RiderLocation::create([
        'rider_id' => $rider->id,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
    ]);

    return response()->json(['status' => 'success']);
}



}
