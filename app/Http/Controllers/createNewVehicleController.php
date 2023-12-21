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

    // public function createVehicle(Request $request)
    // {

    //     // Check if 'isNew' parameter is present and true
    //     if ($request->input('isNew') === 'true') {
    //         // Access the value of 'isNew' parameter
    //         $isNew = $request->input('isNew');

    //             // Validate the incoming request data, if needed
    //             $validatedData = $request->validate([
    //                 'vehicleNumber3' => 'required|string|unique:automobile_vehicles,vehicleNumber',
    //                 'customerId3' => 'required|exists:customers,CustomerId',
    //                 'make3' => 'required|string',
    //                 'model3' => 'required|string',
    //                 'year3' => 'required|string',
    //             ]);
    //     }

    //     // Validate the incoming request data, if needed
    //     $validatedData = $request->validate([
    //         'vehicleNumber3' => 'required|string|unique:automobile_vehicles,vehicleNumber',
    //         'customerId3' => 'required|exists:customers,CustomerId',
    //         'make3' => 'required|string',
    //         'model3' => 'required|string',
    //         'year3' => 'required|string',
    //     ]);
    //     // Create a new instance of the AutomobileVehicle model
    //     $newVehicle = new AutomobileVehicle;

    //     // Assign values from the request to the model attributes
    //     $newVehicle->vehicleNumber = $validatedData['vehicleNumber3'];
    //     $newVehicle->customerId = $validatedData['customerId3'];
    //     $newVehicle->make = $validatedData['make3'];
    //     $newVehicle->model = $validatedData['model3'];
    //     $newVehicle->year = $validatedData['year3'];

    //     // Save the new record to the database
    //     $newVehicle->save();

    //     // Store a success message in the session
    //     session()->flash('message', $newVehicle->vehicleNumber . ' Vehicle created successfully');

    //     // Attach a success message to the redirect
    //     return response()->json(['success' => 'true', 'message' => 'Vehicle created successfully']);
    // }
    public function createVehicle(Request $request)
    {
        // Access the value of 'isNew' parameter
        $isNew = $request->input('isNew') === 'true';

        // Define the common validation rules
        $commonValidationRules = [
            'vehicleNumber3' => 'required|string|unique:automobile_vehicles,vehicleNumber',
            'make3' => 'required|string',
            'model3' => 'required|string',
            'year3' => 'required|string',
        ];

        // Define the specific validation rules based on the value of 'isNew'
        $specificValidationRules = $isNew
            ? ['customerId3' => 'required|exists:customers,CustomerId']
            : ['customerId3' => 'required'];

        // Merge the common and specific validation rules
        $validationRules = array_merge($commonValidationRules, $specificValidationRules);

        // Validate the incoming request data
        $validatedData = $request->validate($validationRules);

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

        // Store a success message in the session
        session()->flash('message', $newVehicle->vehicleNumber . ' Vehicle created successfully');

        // Attach a success message to the redirect
        return response()->json(['success' => true, 'message' => 'Vehicle created successfully']);
    }
}
