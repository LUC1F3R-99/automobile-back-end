<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutomobileVehicle;
use App\Models\Customer;

class QuotationController extends Controller
{
    public function fetchAllData(Request $request)
    {
        // Retrieve the data from the request
        $searchVehicleNumber = $request->input('searchVehicleNo');

        // 1. Search automobile_vehicles table with the vehicleNumber and get the relevant customerId
        $vehicleData = AutomobileVehicle::where('vehicleNumber', $searchVehicleNumber)->first();

        if (!$vehicleData) {
            return response()->json(['error' => 'Vehicle data not found'], 404);
        }

        // 2. Then use that customerId and search customers table to get the customer data
        $customerId = $vehicleData->customerId;
        $customerData = Customer::where('customerId', $customerId)->first();

        if (!$customerData) {
            return response()->json(['error' => 'Customer data not found'], 404);
        }

        // 3. Return both automobile_vehicle and customers data to the view using ajax without refreshing the page
        return response()->json([
            'vehicleData' => $vehicleData,
            'customerData' => $customerData,
        ]);
    }
}
