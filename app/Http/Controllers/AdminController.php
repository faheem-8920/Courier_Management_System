<?php

namespace App\Http\Controllers;
use App\Models\Shipment;
use App\Models\User;
use App\Models\rider;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $table->PickupTime=$req->PickupTime;
        $table->DeliveryAddress=$req->DeliveryAddress;
        $table->DeliveryType=$req->DeliveryType;
        $table->ParcelWeight=$req->ParcelWeight;
        $table->save();
            
return redirect()->back();  
    } 

    public function saverider(Request $req){
     
    $table=new rider();

    $table->Fullname=$req->Fullname;
    $table->Email=$req->Email;
    $table->Phone=$req->Phone;
    $table->DateOfBirth=$req->DateOfBirth;
    $table->HireDate=$req->HireDate;
    $table->WorkingShift=$req->WorkingShift;
    $table->WorkingZone=$req->DeliveryZone;
    $table->VehicleType=$req->VehicleType;
    $table->PlateNumber=$req->PlateNumber;
    $table->VehicleModel=$req->VehicleModel;
    $table->AdminNotes=$req->Adminnotes;
    

$table->VehicleInspected = $req->has('VehicleInspected') ? 1 : 0;
$table->TermsAccepted = $req->has('TermsAccepted') ? 1 : 0;


    $table->save();
return redirect()->back();    }


public function showriders(){
    $riders=rider::get();
    return view('admin.riders',compact('riders'));
}

public function showshipments(){
    $Shipments=Shipment::get();
    return view('admin.shipments',compact('Shipments'));
}
public function showuserrecords(){
    $Users=User::get();
    return view('admin.users',compact('Users'));
}
}
