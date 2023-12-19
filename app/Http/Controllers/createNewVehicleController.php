<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutomobileVehicle;

class createNewVehicleController extends Controller
{
    public function createVehicle(Request $request)
    {
        // Validate the incoming request data, if needed
        $validatedData = $request->validate([
            'vehicleNumber' => 'required|string|unique:automobile_vehicles,vehicleNumber',
            'customerId' => 'required|exists:customers,CustomerId', // assuming customers table and 'id' is the primary key
            'make' => 'required|string',
            'make' => 'required|string',
            'year' => 'required|string',
        ]);

        // Create a new instance of the AutomobileVehicle model
        $newVehicle = new AutomobileVehicle;

        // Assign values from the request to the model attributes
        $newVehicle->vehicleNumber = $validatedData['vehicleNumber'];
        $newVehicle->customerId = $validatedData['customerId'];
        $newVehicle->make = $validatedData['make'];
        $newVehicle->year = $validatedData['year'];

        // Save the new record to the database
        $newVehicle->save();

        // Attach a success message to the redirect
        return redirect()->back()->with('success', 'Vehicle created successfully');
    }
}
