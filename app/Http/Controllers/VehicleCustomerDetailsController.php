<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VehicleCustomerDetailsController extends Controller
{
    public function FetchVehicleCustomerDetails(Request $request)
    {
        try {
            // Retrieve the data from the request
            $searchVehicleNumber = $request->vehicleNumber;

            // Perform an inner join between 'automobile_vehicles' and 'customers' using 'customerId'
            $result = DB::table('automobile_vehicles')
                ->join('customers', 'automobile_vehicles.customerId', '=', 'customers.customerId')
                ->join('vehicle_insurances', 'automobile_vehicles.vehicleNumber', '=', 'vehicle_insurances.vehicleNumber')
                ->where('automobile_vehicles.vehicleNumber', $searchVehicleNumber)
                ->select('automobile_vehicles.*', 'customers.*','vehicle_insurances.*')
                ->first();

            if ($result) {
                // The $result variable now contains the details of the vehicle and its associated customer
                return response()->json($result);
            } else {
                // Handle the case where no matching vehicle is found
                return response()->json(['error' => 'Vehicle not found'], 404);
            }
        } catch (Exception $e) {
            // Log the error (if desired)
            Log::error($e);

            // Return a JSON response with an error message
            return response()->json(['error' => 'An error occurred while fetching vehicle details'], 500);
        }
    }
}
