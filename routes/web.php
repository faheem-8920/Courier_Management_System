<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Adminmiddleware;
use App\Http\Middleware\Ridermiddleware;
use App\Http\Middleware\Usermiddleware;


use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Googlecontroller;

use App\Mail\ParcelDeliveredMail;
use App\Http\Controllers\TrackRiderLocationController;



// Controller routes
Route::post('/uploadcourier',[UserController::class,'savecourier']);
Route::post('/saverider',[AdminController::class,'saverider']);
Route::get('/mydashboard', function () {
    return view('dashboard');
});

Route::get('/downloadcourierdetails/{id}',[UserController::class,'DownloadCourierPdf']);
// User routes
Route::get('/', function () {
    return view('index');
});
Route::get('/usercouriers',[UserController::class,'UserCouriers']);

Route::get('/usercourierdetails/{id}',[UserController::class,'courierdetails']);


Route::get('/index', function () {
    return view('index');
});
Route::get('/feature', function () {
    return view('feature');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/price', function () {
    return view('price');
});
Route::get('/quote', function () {
    return view('quote');
});
Route::get('/team', function () {
    return view('team');
});
Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/addcourier', function () {
    return view('addcourier');
});

Route::get('/addrider', function () {
    return view('addrider');
});


// Admin panel routes
// Route::get('/admindashboard', function () {
//     return view('admin.dashboard');
// });


// Role-based dashboard redirect after login
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $role = Auth::user()->id;

        if ($role === 'admin') return redirect('/admindashboard');
        if ($role === 'rider') return redirect('/rider');
        if ($role === 'user') return redirect('/index');

        abort(403, 'Unauthorized');
    })->name('dashboard');
});


// User routes (protected)
Route::middleware(['auth', UserMiddleware::class])->group(function () {
    Route::get('/user', function () {
        return view('index');
    })->name('index');
});


// Admin routes (protected)
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
 
    Route::get('/riders', function () {
        return view('admin.riders');
    });
    Route::get('/shipments', function () {
        return view('admin.shipments');
    });
    Route::get('/users', function () {
        return view('admin.users');
    });
Route::get('/getriderdetails/{id}',[AdminController::class,'getriderdetails']);
Route::get('/updateriderdetails/{id}',[AdminController::class,'updateriderdetails']);

// Route::get('/dashboard', [AdminController::class, 'showsadmin']);
    Route::get('/riders',[AdminController::class,'showriders']);


Route::get('/riders',[AdminController::class,'showriders']);

Route::get('/shipments', [AdminController::class,'showshipments']);
Route::get('/users',[AdminController::class,'showuserrecords']);
Route::get('/admindashboard', [AdminController::class, 'dashboard']);


Route::post('/delete/{id}', [AdminController::class, 'deleterider']);



});

// Rider routes (protected)
Route::middleware(['auth', RiderMiddleware::class])->group(function () {
    Route::get('/rider', function () {
        return view('Rider.index');



    })->name('Rider.index');
    

 Route::get('/earning', function () {
        return view('Rider.earning');
    });
    Route::get('/delivery', function () {
        return view('Rider.delivery');
    });
    Route::get('/pickup', function () {
        return view('Rider.pickup');
    });
    Route::get('/profile', function () {
        return view('Rider.profile');
    });
    Route::get('/support', function () {
        return view('Rider.support');
    });


    Route::post('/rider/order/{id}/accept', [RiderController::class, 'acceptorder'])->name('rider.accept');

    Route::post('/rider/order/{id}/transit', [RiderController::class, 'transitorder'])
        ->name('rider.transit');

    Route::post('/rider/order/{id}/delivered', [RiderController::class, 'deliveredorder'])
     ->name('rider.delivered');



});
Route::get('/delivery', [RiderController::class, 'myShipments'])
     ->middleware('auth'); 

Route::get('/rider', function () {
        return view('Rider.index');
    })->name('Rider.index');


Route::get('/exporttoexcel',[AdminController::class,('exporttoexcel')]);

Route::get('/exporttoexcel2',[AdminController::class,('exporttoexcel2')]);

Route::get('/exporttoexcel3',[AdminController::class,('exporttoexcel3')]);


 
 Route::get('/admindashboard', [AdminController::class, 'myadmindashboard'])->name('admin.dashboard');


Route::get('auth/google', [Googlecontroller::class, 'googlepage']);

Route::get('auth/google/callback', [Googlecontroller::class, 'googlecallback']);





// Rider updates location
Route::middleware('auth:rider')->post('/rider/update-location', [TrackRiderLocationController::class, 'updateLocation'])->name('rider.updateLocation');

// Admin map page
Route::get('/riders/map', [TrackRiderLocationController::class, 'showMap'])->name('riders.map');

// Get JSON of all riders
Route::get('/riders/locations', [TrackRiderLocationController::class, 'getLocations'])->name('riders.locations');

