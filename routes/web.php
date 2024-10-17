<?php

use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\PartyCategoryController;
use App\Http\Controllers\Admin\PartyFacilityController;
use App\Http\Controllers\Admin\PartyMediaController;
use App\Http\Controllers\Admin\PartyReservationController;
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
    return view('admin.index');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('cities', CityController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('party_categories', PartyCategoryController::class);
    Route::resource('party_facilities', PartyFacilityController::class);
    Route::resource('party_media', PartyMediaController::class);
    Route::resource('party_reservations', PartyReservationController::class);
});
