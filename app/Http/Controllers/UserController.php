<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipment;
use App\Models\User;
class UserController extends Controller

{


 public function savecourier(Request $req){


        $table=new Shipment();
        $trackingNumber = 'RT-' . mt_rand(100000, 999999);
        $table->TrackingNumber=$trackingNumber;
        $table->SenderName=$req->SenderName;
        $table->SenderPhone=$req->SenderPhone;
        $table->SenderEmail=$req->SenderEmail;
        $table->ReceiverName=$req->ReceiverName;
        $table->ReceiverPhone=$req->ReceiverPhone;
        $table->ReceiverEmail=$req->ReceiverEmail;
        $table->PickupAddress=$req->PickupAddress;

        $table->PickupSlot=$req->PickupTime;

        $table->DeliveryAddress=$req->DeliveryAddress;
        $table->DeliveryType=$req->DeliveryType;
        $table->DeliveryZone=$req->DeliveryZone;
        $table->ParcelWeight=$req->ParcelWeight;
        $table->UserId=Auth::user()->id;
        $table->save();
            
return redirect('/usercouriers');
    } 


    public function UserCouriers(){
        $couriers=Shipment::where('UserId',auth()->id())->get();
        return view('YourCouriers',compact('couriers'));
    }

    public function DownloadCourierPdf($id)
{
    // Security: user can download only their own courier
    $courier = Shipment::where('id', $id)
        ->where('UserId', Auth::id())
        ->firstOrFail();

    $pdf = Pdf::loadView('CourierDetailsPdf',[
        'courier' => $courier
    ]);

    return $pdf->download('Courier-' . $courier->TrackingNumber . '.pdf');
}

public function courierdetails($id){


   $courierdetail = Shipment::find($id);
return view('CourierDetails', compact('courierdetail'));




}

}
