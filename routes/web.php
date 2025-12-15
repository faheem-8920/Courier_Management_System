<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
Route::get('/index', function () {
    return view('admin.index');
});

// Rider routes 

Route::get('/rider', function () {
    return view('Rider.index');
});
Route::get('/delivery', function () {
    return view('Rider.delivery');
});
Route::get('/earning', function () {
    return view('Rider.earning');
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




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
