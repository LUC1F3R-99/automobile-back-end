<?php

use App\Http\Controllers\VehicleCustomerDetailsController;
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

// This route will pass the vechile number to the controller and fetch all data
Route::post('/fetchVehicleCustomerData',[VehicleCustomerDetailsController::class,'VehicleCustomerDetails']);
// Route to update vehicle and customer data
Route::post('/updateVehicleCustomerData', [VehicleCustomerDetailsController::class,'UpdateVehicleCustomerDetails']);
// Route to enter new customer and vehicle details
Route::post('/enterVehicleCustomerData', [VehicleCustomerDetailsController::class,'EnterVehicleCustomerDetails']);
