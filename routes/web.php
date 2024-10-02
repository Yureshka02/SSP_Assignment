<?php

use App\Enums\Role;
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
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\serviceHomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SuppliersController;
use App\Models\Review;
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

    Route::get('thankyou/{appointment}', [
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

//home route
Route::get('/', HomeController::class)
    ->name('home');


//reviews routes
Route::middleware('auth')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');


Route::get('/', function () {
    $reviews = Review::with('user')->latest()->get(); // Fetch reviews
    return view('home', compact('reviews')); // Pass reviews to the view
})->name('home');

//dashboard route
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', 'verified','role:Admin' ]);

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
Route::patch('/appointments/{id}/status', [AppointmentController::class, 'updateStatus']);

Route::delete('/appointments/{id}', [AppointmentController::class, 'delete']);


