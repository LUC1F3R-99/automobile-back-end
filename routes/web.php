<?php

use App\Http\Controllers\createNewCustomer;
use App\Http\Controllers\createNewVehicleController;
use App\Http\Controllers\QuotationController;
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
//test page
Route::get('/test', function () {
    return view('test');
});

// This route will pass the vechile number to the controller
Route::post('/fetchData',[QuotationController::class,'fetchAllData'])->name('fetchVehicleData');

//create a new vehicle
Route::get('/createVehicle',function () {
    return view('createVehicle');
});

Route::post('/createnewVehicle', [createNewVehicleController::class,'createVehicle']);

//create a new customer
Route::get('/createCustomer',function () {
    return view('createCustomer');
});

Route::post('/createnewCustomer', [createNewCustomer::class,'createCustomer']);
//route to suggest next customer ID
Route::get('/fetchNextCustomerId', [createNewCustomer::class, 'fetchNextCustomerId'])->name('fetchNextCustomerId');

