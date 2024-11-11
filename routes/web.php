<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PartiesController;
use App\Http\Controllers\Admin\PartyCategoryController;
use App\Http\Controllers\Admin\PartyFacilityController;
use App\Http\Controllers\Admin\PartyMediaController;
use App\Http\Controllers\Admin\PartyReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('parties/inactive', [PartiesController::class, 'inactiveParties'])->name('parties.inactive');
        Route::post('parties/activate/{id}', [PartiesController::class, 'activate'])->name('parties.activate');
        Route::resource('parties', PartiesController::class);
        Route::resource('cities', CityController::class);
        Route::resource('facilities', FacilityController::class);
        Route::resource('party_categories', PartyCategoryController::class);
        Route::resource('party_facilities', PartyFacilityController::class);
        Route::resource('party_media', PartyMediaController::class);
        Route::resource('party_reservations', PartyReservationController::class);
        Route::get('total-collected', [AdminController::class, 'totalCollected'])->name('total.collected');
        Route::post('process-payment', [AdminController::class, 'processPayment'])->name('process.payment');
    });
    Route::post('/payment', [PaymentController::class, 'createPayment'])->name('payments.create');
    Route::get('/payment', function () {
        return view('admin.payment');
    })->name('payment.form');
});

require __DIR__ . '/auth.php';
