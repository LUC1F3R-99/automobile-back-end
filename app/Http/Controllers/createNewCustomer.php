<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class createNewCustomer extends Controller
{
    public function createCustomer(Request $request)
    {
        // Validate the incoming request data, if needed
        $validatedData = $request->validate([
            'customerId' => 'required|string|unique:customers,customerId',
            'name' => 'required|string',
            'contactNo' => 'required|string',
            'nic' => 'required|string',
            'address' => 'required|string',
        ]);

        // Create a new instance of the AutomobileVehicle model
        $newCustomer = new Customer;

        // Assign values from the request to the model attributes
        $newCustomer->customerId = $request->customerId;
        $newCustomer->name = $validatedData['name'];
        $newCustomer->contactNo = $validatedData['contactNo'];
        $newCustomer->nic = $validatedData['nic'];
        $newCustomer->address = $validatedData['address'];

        // Save the new record to the database
        $newCustomer->save();

        // Attach a success message to the redirect
        return redirect()->back()->with('success', 'Customer created successfully');
    }

    public function fetchNextCustomerId()
    {
        // Fetch the next customer ID from the database
        $nextCustomerId = Customer::max('customerId') + 1;

        // Return the next customer ID as JSON
        return response()->json(['nextCustomerId' => $nextCustomerId]);
    }
}
