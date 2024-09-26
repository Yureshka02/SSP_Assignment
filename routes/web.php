<?php


use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)
    ->name('home');


Route::middleware([
    'role'
])->get('/dev', function () {
    dd(auth()->user()->role == App\Enums\Role::Customer);
});

Route::get('/',HomeController::class)
    ->name('home');


Route::get('/reservations', function () {
    return view('dashboard');
})  ->middleware(['auth', 'verified'])
    ->name('dashboard');

//products route
Route::resource('products',ProductsController::class)
    ->middleware(['auth', 'verified']);

//bookings route
Route::resource('Bookings',BookingsController::class)
    ->middleware(['auth', 'verified']);

//facilities route
Route::resource('facilities',FacilitiesController::class)
    ->middleware(['auth', 'verified']);
//suppliers route
Route::resource('suppliers',SuppliersController::class)
    ->middleware(['auth', 'verified']);
//customers route
Route::resource('customers',CustomersController::class)
    ->middleware(['auth', 'verified']);
//dashboard route
Route::resource('dashboard',HomeController::class)
    ->middleware(['auth', 'verified']);









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
