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
use App\Mail\Paracelrejectedemail;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Mail\ContactReplyMail;
use App\Mail\RiderMessageEmail;


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
        $table->DeliveryZone=$req->DeliveryZone;
        $table->ParcelWeight=$req->ParcelWeight;
        $table->UserId=Auth::id();
        $table->save();
            
return redirect('/usercouriers');
    } 


    public function UserCouriers(){
        $couriers=Shipment::where('UserId',Auth::user()->id)->get();
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
    $rider->UserId=$user->id;
    $rider->Fullname = $req->Fullname;
    $rider->Email = $req->Email;
    $rider->Phone = $req->Phone;
    $rider->DateOfBirth = $req->DateOfBirth;
    $rider->HireDate = $req->HireDate;
    $rider->WorkingShift = $req->WorkingShift;
    $rider->WorkingZone = $req->WorkingZone;
    $rider->VehicleType = $req->VehicleType;
    $rider->LicenseNumber=$req->LicenseNumber;
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


return redirect('/riders')
    ->with('success', 'Rider added successfully');
}


public function showriders(){
    $riders=rider::get();
    return view('admin.riders',compact('riders'));
}

public function getriderdetails($id){

    $riderdata=rider::findOrFail($id);

    return view('admin.updaterider',compact('riderdata'));

}



   public function updateriderdetails(Request $req, $id)
{
    $rider = Rider::findOrFail($id);

    // Update Rider info
    $rider->update([
        'Fullname' => $req->Fullname,
        'Email' => $req->Email,
        'Phone' => $req->Phone,
        'DateOfBirth' => $req->DateOfBirth,
        'HireDate' => $req->HireDate,
        'WorkingShift' => $req->WorkingShift,
        'WorkingZone' => $req->WorkingZone,
        'VehicleType' => $req->VehicleType,
        'LicenseNumber'=>$req->LicenseNumber,
        'PlateNumber' => $req->PlateNumber,
        'VehicleModel' => $req->VehicleModel,
        'AdminNotes' => $req->AdminNotes,
        'VehicleInspected' => $req->has('VehicleInspected') ? 1 : 0,
        'TermsAccepted' => $req->has('TermsAccepted') ? 1 : 0,
    ]);

    // Update linked user if exists
    if($rider->user) {
        $rider->user->update([
            'name' => $req->Fullname,
            'email' => $req->Email,
        ]);

        // Optional: Update password if provided
        if($req->Password) {
            $rider->user->update([
                'password' => Hash::make($req->Password)
            ]);
        }
    }

    return redirect()->back()->with('success', 'Rider details updated successfully');
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

public function exporttoexcel(){
    return Excel::download(new UsersExport, 'users.xlsx');
}
public function exporttoexcel2(){
    return Excel::download(new UsersExport, 'users.xlsx');
}
public function exporttoexcel3(){
    return Excel::download(new UsersExport, 'users.xlsx');
}


public function deleterider($id){
    $rider = Rider::findOrFail($id);
    $rider->delete();
    return redirect('/riders');
}


 

public function myadmindashboard()
{
    // Original Stats
    $totalShipments = Shipment::count();
    $totalUsers = User::count();
    $totalRiders = Rider::count();
    $totalCancelled = Shipment::where('Status', 'Pending')->count();
    $totalDelayed = Shipment::whereNotNull('DeliveredAt')
                            ->whereColumn('DeliveredAt', '>', 'InTransitAt')
                            ->count();

    // Additional Analytics Sections
    $totalDelivered = Shipment::where('Status', 'Delivered')->count();
    $totalInTransit = Shipment::where('Status', 'InTransit')->count();
    $expressDeliveries = Shipment::where('DeliveryType','express')->count();
    $standardDeliveries = Shipment::where('DeliveryType','standard')->count();
    $overnightDeliveries = Shipment::where('DeliveryType','overnight')->count();
    
    $topUsersCount = Shipment::select('UserId')
                             ->groupBy('UserId')
                             ->orderByRaw('COUNT(*) DESC')
                             ->take(10)
                             ->count();

    $topRidersCount = Shipment::select('AssignedRiderId')
                              ->groupBy('AssignedRiderId')
                              ->orderByRaw('COUNT(*) DESC')
                              ->take(10)
                              ->count();

    $ridersOnShift = Rider::where('status','active')->count();

    // Shipments per day
    $shipmentsPerDay = Shipment::selectRaw('DATE(created_at) as date, COUNT(*) as total')
                               ->groupBy('date')
                               ->orderBy('date')
                               ->get();

    // Shipments per rider
    $shipmentsPerRider = Shipment::select('AssignedRiderId')
                                 ->selectRaw('COUNT(*) as total')
                                 ->with('rider')  
                                 ->groupBy('AssignedRiderId')
                                 ->get();

    // Top Users
    $topUsers = Shipment::select('UserId')
                        ->selectRaw('COUNT(*) as total')
                        ->with('user')
                        ->groupBy('UserId')
                        ->orderByDesc('total')
                        ->take(10)
                        ->get();

    // Top Riders
    $topRiders = Shipment::where('Status', 'Delivered')
                         ->select('AssignedRiderId')
                         ->selectRaw('COUNT(*) as total_delivered')
                         ->with('rider')
                         ->groupBy('AssignedRiderId')
                         ->orderByDesc('total_delivered')
                         ->take(10)
                         ->get();

    return view('admin.dashboard', compact(
        'totalShipments',
        'totalUsers',
        'totalRiders',
        'totalCancelled',
        'totalDelayed',
        'totalDelivered',
        'totalInTransit',
        'expressDeliveries',
        'standardDeliveries',
        'overnightDeliveries',
        'topUsersCount',
        'topRidersCount',
        'ridersOnShift',
        'shipmentsPerDay',
        'shipmentsPerRider',
        'topUsers',
        'topRiders'
    ));
}

public function rejectShipment($id)
{
    $shipment = Shipment::findOrFail($id);

    // Only allow rejecting shipments that are not already completed
    if ($shipment->Status === 'Completed') {
        return redirect()->back()->with('error', 'Cannot reject a completed shipment.');
    }

    $shipment->Status = 'Rejected'; // Update status to Rejected
    $shipment->save();

    return redirect()->back()->with('success', 'Shipment rejected successfully.');
}


//Contact Form functions

public function store(Request $request){
        $request->validate([
            'Name'=>'required|string|max:255',
            'Email'=>'required|email',
            'Message'=>'required|string|min:10',
        ]);


        Contact::create($request->all());

        return back()->with('success', 'Message sent successfully!');
    }

// Admin: List all contact messages
public function showcontacts(){
    // Fetch all contacts, latest first
    $contacts = Contact::orderBy('created_at', 'desc')->get();

    // Pass to the admin view
    return view('admin.Contacts', compact('contacts'));
}





public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|min:5',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->Reply = $request->reply;  // Save reply in database
        $contact->save();
 
        Mail::to($contact->Email)->send(
        new ContactReplyMail($contact->Name, $contact->Reply)
    );

        return redirect("/showcontacts")
                         ->with('success', 'Reply saved successfully!');
    }

    public function deletecontact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('/showcontacts');
    }

// RIDER MESSAGE MAIL

public function sendRiderMessage(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'name' => 'required|string',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ]);

    // Send mail
    Mail::to($request->email)->send(new RiderMessageEmail(
        $request->subject,
        $request->message,
        $request->name
    ));

    return redirect()->back()->with('success', 'Message sent to rider successfully!');
}




}