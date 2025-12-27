<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RiderController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Adminmiddleware;
use App\Http\Middleware\Ridermiddleware;
use App\Http\Middleware\Usermiddleware;
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
        $role = auth()->user()->role;

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
    Route::get('/admindashboard', function () {
        return view('admin.dashboard');
    });
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

Route::get('/riders',[AdminController::class,'showriders']);
Route::get('/shipments', [AdminController::class,'showshipments']);
Route::get('/users',[AdminController::class,'showuserrecords']);
Route::get('/admindashboard', [AdminController::class, 'dashboard']);



});

// Rider routes (protected)
Route::middleware(['auth', RiderMiddleware::class])->group(function () {
    Route::get('/rider', function () {
        return view('Rider.index');

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
});
Route::get('/delivery', [RiderController::class, 'myShipments'])
     ->middleware('auth'); 


    })->name('Rider.index');

Route::get('/exporttoexcel',[AdminController::class,('exporttoexcel')]);

Route::get('/exporttoexcel2',[AdminController::class,('exporttoexcel2')]);

Route::get('/exporttoexcel3',[AdminController::class,('exporttoexcel3')]);

 

