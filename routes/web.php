<?php


use App\Http\Controllers\BookingsController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeeController;
use App\Http\Controllers\LogController;
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

    Route::get('/products-home', [HomeeController::class, '__invoke'])->name('products-home');


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

Route::get('/cache-test',[
    CacheController::class,
    'index'
]);

Route::get('/logs',[
    LogController::class,
    'index'
]);

Route::get('/session',[
    SessionController::class,
    'index'
]);














Route::get('/',HomeController::class)
    ->name('home');


Route::middleware([
    'role:Admin,Customer',
])->get('/dev', function () {
    dd(auth()->user()->role == App\Enums\Role::Customer);
});







Route::get('/',HomeController::class)
    ->name('home');


Route::get('/reservations', function () {
    return view('dashboard');
})  ->middleware(['auth', 'verified'])
    ->name('dashboard');


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
