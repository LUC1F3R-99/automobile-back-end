<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleCustomerDetailsController extends Controller
{
    public function FetchVehicleCustomerDetails(Request $request)
    {
        // Retrieve the data from the request
        $searchVehicleNumber = $request->vehicleNumber;

        // Perform an inner join between 'automobile_vehicles' and 'customers' using 'customerId'
        $result = DB::table('automobile_vehicles')
            ->join('customers', 'automobile_vehicles.customerId', '=', 'customers.customerId')
            ->where('automobile_vehicles.vehicleNumber', $searchVehicleNumber)
            ->select('automobile_vehicles.*', 'customers.*')
            ->first();

        if ($result) {
            // The $result variable now contains the details of the vehicle and its associated customer
            return response()->json($result);
        } else {
            // Handle the case where no matching vehicle is found
            return response()->json(['error' => 'Vehicle not found'], 404);
        }
    }
}
