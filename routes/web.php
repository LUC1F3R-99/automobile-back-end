<?php

use App\Http\Controllers\QuotationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// This route will pass the vechile data to the controller
Route::post('/getVehicleDetails',[QuotationController::class,'VehicleDetails']);
