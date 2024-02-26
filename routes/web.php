<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('List');
});

Route::get('/create', function () {
    return Inertia::render('Create');
});

Route::get('/show/{car}', function ($car) {
    return Inertia::render('Show', ['car' => $car]);
});

Route::get('/reservation/{car}', function ($car) {
    return Inertia::render('Reservation', ['carId' => $car]);
});


Route::post('/cars', [CarController::class, 'store'])->name('cars.store');
Route::get('/cars/{car}', [CarController::class, 'show'])->name('cars.show');
Route::post('/cars/{car}/reservations', [ReservationController::class, 'store'])->name('reservations.store');



