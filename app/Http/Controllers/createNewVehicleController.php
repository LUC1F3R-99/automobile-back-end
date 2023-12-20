<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutomobileVehicle;

class createNewVehicleController extends Controller
{

    public function createVehiclePage()
    {

        return view('createVehicle');
    }

    public function createVehicle(Request $request)
    {
        // Validate the incoming request data, if needed
        $validatedData = $request->validate([
            'vehicleNumber3' => 'required|string|unique:automobile_vehicles,vehicleNumber',
            'customerId3' => 'required|exists:customers,CustomerId',
            'make3' => 'required|string',
            'model3' => 'required|string',
            'year3' => 'required|string',
        ]);

        // Create a new instance of the AutomobileVehicle model
        $newVehicle = new AutomobileVehicle;

        // Assign values from the request to the model attributes
        $newVehicle->vehicleNumber = $validatedData['vehicleNumber3'];
        $newVehicle->customerId = $validatedData['customerId3'];
        $newVehicle->make = $validatedData['make3'];
        $newVehicle->model = $validatedData['model3'];
        $newVehicle->year = $validatedData['year3'];

        // Save the new record to the database
        $newVehicle->save();

        // Attach a success message to the redirect
        return response()->json(['success'=>'true', 'message'=> 'Vehicle created successfully']);
    }
}
