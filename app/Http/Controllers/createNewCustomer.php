<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class createNewCustomer extends Controller
{
    public function createCustomerPage()
    {
        return view('createCustomer');
    }

    public function createCustomer(Request $request)
    {
        // Validate the incoming request data, if needed
        $validatedData = $request->validate([
            'customerId' => 'required|string|unique:customers,customerId',
            'name' => 'required|string',
            'contactNo' => 'required|string|unique:customers,contactNo',
            'nic' => 'required|string|unique:customers,nic',
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
        return response()->json(['success' => true, 'message' => 'Customer created successfully']);
    }

    public function fetchNextCustomerId()
    {
        // Fetch the next customer ID from the database
        $nextCustomerId = Customer::max('customerId') + 1;

        // Return the next customer ID as JSON
        return response()->json(['nextCustomerId' => $nextCustomerId]);
    }

    public function fetchCustomerData(Request $request)
    {

        // Retrieve the data from the request
        $searchCustomerNic = $request->input('searchCustomerNic');

        // search customer table with the NIC
        $customerData = Customer::where('nic', $searchCustomerNic)->first();

        if (!$customerData) {
            return response()->json(['error' => 'Customer data not found']);
        }

        // Check if customerId is set
        if (isset($customerData->customerId)) {
            return response()->json(['customerData' => $customerData]);
        }
    }
}
