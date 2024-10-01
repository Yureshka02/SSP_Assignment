<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\serviceHomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SuppliersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

require __DIR__.'/admin/users.php';

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    //routes for services and products
    Route::get('/products-home', [HomeeController::class, '__invoke'])->name('products-home');
    Route::get('/services-home', [serviceHomeController::class, '__invoke'])->name('services-home');

    //garage routes
    Route::get('garage-check-out', [
        GarageController::class,
        'garage_checkOut'
    ])->name('garage-checkout');

    Route::post('garage-check-out', [
        GarageController::class,
        'completeGarage'
    ])->name('garage.complete');

    Route::get('thank-you/{appointment}', [
        GarageController::class,
        'appointmentConfirmation'
    ])->name('garage.confirm');

    // cart routes
    Route::get('check-out', [
        CartController::class,
        'checkOut'
    ])->name('checkout');

    Route::post('check-out', [
        CartController::class,
        'completeOrder'
    ])->name('checkout.complete');

    Route::get('thank-you/{order}', [
        CartController::class,
        'orderConfirmation'
    ])->name('checkout.confirm');
});

Route::get('/cache-test', [
    CacheController::class,
    'index'
]);

Route::get('/logs', [
    LogController::class,
    'index'
]);

Route::get('/session', [
    SessionController::class,
    'index'
]);

Route::get('/notification', [
    NotificationController::class,
    'index'
]);

Route::get('/', HomeController::class)
    ->name('home');

Route::middleware([
    'role:Admin,Customer',
])->get('/dev', function () {
    dd(auth()->user()->role == App\Enums\Role::Customer);
});

//dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//bookings route
Route::resource('Bookings', BookingsController::class)
    ->middleware(['auth', 'verified']);

//facilities route
Route::resource('facilities', FacilitiesController::class)
    ->middleware(['auth', 'verified']);

//suppliers route
Route::resource('suppliers', SuppliersController::class)
    ->middleware(['auth', 'verified']);

//customers route
Route::resource('customers', CustomersController::class)
    ->middleware(['auth', 'verified']);

//appointments route
Route::post('/appointments/notify', [AppointmentController::class, 'notify']);
