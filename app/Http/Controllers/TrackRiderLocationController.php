<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rider;
use App\Models\RiderLocation;

class TrackRiderLocationController extends Controller
{
    // Rider updates its location
    // public function updateLocation(Request $request)
    // {
    //     $request->validate([
    //         'latitude' => 'required|numeric',
    //         'longitude' => 'required|numeric',
    //     ]);

    //     $rider = auth()->user(); // Make sure rider is logged in

    //     // Store location
    //     RiderLocation::updateOrCreate(
    //         ['rider_id' => $rider->id],
    //         ['latitude' => $request->latitude, 'longitude' => $request->longitude]
    //     );

    //     return response()->json(['status' => 'success']);
    // }

    // Admin view map page
    public function showMap()
    {
        return view('Rider.map');
    }

    // Return all rider locations as JSON
    public function getLocations()
    {
        return RiderLocation::with('rider:id,name')->get();
    }
    public function updateLocation(Request $request)
    {
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $rider = auth()->user(); // Make sure rider is logged in

        // Store location
        RiderLocation::updateOrCreate(
            ['rider_id' => $rider->id],
            ['latitude' => $request->latitude, 'longitude' => $request->longitude]
        );

        return response()->json(['status' => 'success']);
    }
}
