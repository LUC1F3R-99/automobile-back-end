<?php

use App\Http\Controllers\createNewCustomer;
use App\Http\Controllers\createNewVehicleController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\QuotationController;
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
// New
Route::get('/homeView', function () {
    return view('home');
});

// This route will pass the vechile number to the controller and fetch all data
Route::post('/fetchVehicleCustomerData',[VehicleCustomerDetailsController::class,'FetchVehicleCustomerDetails']);



// Old
Route::get('/', function () {
    return view('welcome');
});
//test page
Route::get('/test', function () {
    return view('test');
});


// route to search customer data using NIC and return
Route::post('customerDetails',[createNewCustomer::class,'fetchCustomerData'])->name('fetchCustomerData');;

//route to access create a new vehicle page
Route::get('/createVehicle', [createNewVehicleController::class,'createVehiclePage']);

Route::post('/createnewVehicle', [createNewVehicleController::class,'createVehicle'])->name('createnewVehicle');

//route to access create new customer page
Route::get('/createCustomer', [createNewCustomer::class,'createCustomerPage']);

Route::post('/createnewCustomer', [createNewCustomer::class,'createCustomer'])->name('createnewCustomer');
//route to suggest next customer ID
Route::get('/fetchNextCustomerId', [createNewCustomer::class, 'fetchNextCustomerId'])->name('fetchNextCustomerId');


// Route to update vehicle and customer data
Route::post('/updateAlldata', [QuotationController::class, 'updateAllData'])->name('updateAllData');

//route for go to service job page (Chamal create)
Route::post('/servicejobs',[InvoiceController::class,'loadData'])->name('servicejobs');
//route to load servicejobs page
Route::get('/servicejobs', function () {
    return view('service-jobs');
});

