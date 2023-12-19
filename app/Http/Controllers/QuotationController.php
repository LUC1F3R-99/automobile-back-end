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
        $searchVehicleNumber = $request->input('vehicleNumber');

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


    public function updateAllData(Request $request)
    {
        try {
            $formData = $request->input('formData');

            // Update the database records using the provided form data
            $vehicle = AutomobileVehicle::where('vehicleNumber', $formData['vehicleNumber'])->first();
            $customer = Customer::where('customerId', $formData['customerId'])->first();

            if (!$vehicle || !$customer) {
                return response()->json(['success' => false, 'message' => 'Vehicle or customer not found'], 404);
            }

            // Update relevant fields in the AutomobileVehicle table
            $vehicle->make = $formData['make'];
            $vehicle->model = $formData['model'];
            $vehicle->year = $formData['year'];
            // $vehicle->insuranceNo = $formData['insuranceNo'];

            // Update relevant fields in the Customer table
            $customer->name = $formData['customerName'];
            $customer->contactNo = $formData['contactNo'];
            $customer->nic = $formData['nic'];
            $customer->address = $formData['address'];

            // Save changes
            $vehicle->save();
            $customer->save();

            return response()->json(['success' => true, 'message' => 'Database records updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update database records', 'error' => $e->getMessage()], 500);
        }
    }
}
