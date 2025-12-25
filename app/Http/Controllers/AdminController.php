<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Shipment;
use App\Models\User;
use App\Models\rider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\RiderCredentialsMail;
use Illuminate\Support\Facades\Mail;


class AdminController extends Controller
{

   
   public function saverider(Request $req)
{
    // 1️⃣ Create User for Jetstream login
    $user = User::create([
        'name' => $req->Fullname,
        'email' => $req->Email,
        'password' => Hash::make($req->Password), // Admin sets initial password
        'role' => 'rider',                         // Add 'role' column to users table
        'zone' => $req->WorkingZone,              // Rider zone
    ]);

    // 2️⃣ Create Rider info
    $rider = new Rider();
    $rider->Fullname = $req->Fullname;
    $rider->Email = $req->Email;
    $rider->Phone = $req->Phone;
    $rider->DateOfBirth = $req->DateOfBirth;
    $rider->HireDate = $req->HireDate;
    $rider->WorkingShift = $req->WorkingShift;
    $rider->WorkingZone = $req->WorkingZone;
    $rider->VehicleType = $req->VehicleType;
    $rider->PlateNumber = $req->PlateNumber;
    $rider->VehicleModel = $req->VehicleModel;
    $rider->AdminNotes = $req->AdminNotes;
    $rider->VehicleInspected = $req->has('VehicleInspected') ? 1 : 0;
    $rider->TermsAccepted = $req->has('TermsAccepted') ? 1 : 0;
    
    // Optional: link Rider to User

    $rider->save();

     Mail::to($req->Email)->send(
        new RiderCredentialsMail(
            $req->Fullname,
            $req->Email,
            $req->Password
        )
    );


    return redirect()->back()->with('success', 'Rider added successfully');
}


public function showriders(){
    $riders=rider::get();
    return view('admin.riders',compact('riders'));
}

public function updateriderdetails($id){

    $riderdata=rider::findOrFail($id);

    return view('admin.updaterider',compact('riderdata'));


}

public function showshipments(){
    $Shipments=Shipment::get();
    return view('admin.shipments',compact('Shipments'));
}
public function showuserrecords(){
    $Users=User::get();
    return view('admin.users',compact('Users'));
}
public function dashboard()
{
    $pendingRequests = Shipment::where('Status', 'Pending')->count();

    return view('admin.dashboard', compact('pendingRequests'));
}

}

