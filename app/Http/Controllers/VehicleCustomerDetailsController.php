<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\VehicleInsurance;
use App\Models\AutomobileVehicle;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VehicleCustomerDetailsController extends Controller
{
    // function to fetch both customer and vehicle details according to vehicle number
    // public function VehicleCustomerDetails(Request $request,$userName)
    public function VehicleCustomerDetails(Request $request)
    {
        try {
            // Retrieve the data from the request
            $searchVehicleNumber = $request->searchVehicleNo;

            // Perform an inner join between 'automobile_vehicles' and 'customers' using 'customerId'
            // $result = DB::connection($userName)->table('automobile_vehicles')
            $result = DB::table('automobile_vehicles')
                ->join('customers', 'automobile_vehicles.customerId', '=', 'customers.customerId')
                ->join('vehicle_insurances', 'automobile_vehicles.vehicleNumber', '=', 'vehicle_insurances.vehicleNumber')
                ->where('automobile_vehicles.vehicleNumber', $searchVehicleNumber)
                ->where('automobile_vehicles.isActive', '=', 1)
                ->where('customers.isActive', '=', 1)
                ->where('vehicle_insurances.isActive', '=', 1)
                ->select('automobile_vehicles.*', 'customers.*', 'vehicle_insurances.*')
                ->first();

            if ($result) {
                // The $result variable now contains the details of the vehicle and its associated customer
                return response()->json($result);
            } else {
                // Handle the case where no matching vehicle is found
                return response()->json(['error' => 'Vehicle not found', 'status' => 404]);
            }
        } catch (Exception $e) {
            // Log the error (if desired)
            Log::error($e);

            // Return a JSON response with an error message
            return response()->json(['error' => 'An error occurred while fetching vehicle details'], 500);
        }
    }

    // function to update both vehicle and customer details
    public function UpdateVehicleCustomerDetails(Request $request)
    {
        try {

            // Update the vehicle records using the provided form data
            DB::table('automobile_vehicles')->where(['vehicleNumber' => $request->vehicleNumber])->update([
                'make' => $request->make,
                'model' => $request->model,
                'year' => $request->year,
            ]);
            //Update customer records
            DB::table('customers')->where(['customerId' => $request->customerId])->update([
                'name' => $request->customerName,
                'contactNo' => $request->contactNo,
                'nic' => $request->nic,
                'address' => $request->address,
            ]);
            //Update insurance records
            DB::table('vehicle_insurances')->where(['vehicleNumber' => $request->vehicleNumber])->update([
                'insuranceId' => $request->insuranceNo,
                'company' => $request->insuranceCompany,
                'accidentYear' => $request->accidentYear,
            ]);

            return response()->json(['success' => true, 'message' => 'Database records updated successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to update database records', 'error' => $e->getMessage()], 500);
        }
    }

    // function to update both vehicle and customer details
    public function EnterVehicleCustomerDetails(Request $request)
    {
        try {

            // Create New Customer Record
            $customer = new Customer();
            $customer->customerId = $request->customerId;
            $customer->name = $request->customerName;
            $customer->contactNo = $request->contactNo;
            $customer->nic = $request->nic;
            $customer->address = $request->address;
            $customer->save();

            //Create New Vehicle Record
            $vehicle = new AutomobileVehicle();
            $vehicle->vehicleNumber =$request->vehicleNumber;
            $vehicle->customerId =$request->customerId;
            $vehicle->make =$request->make;
            $vehicle->model =$request->model;
            $vehicle->year =$request->year;
            $vehicle->save();

            //Create New Insurance Record
            $insurance = new VehicleInsurance();
            $insurance->insuranceId =$request->insuranceNo;
            $insurance->vehicleNumber =$request->vehicleNumber;
            $insurance->company =$request->insuranceCompany;
            $insurance->accidentYear =$request->accidentYear;
            $insurance->save();

            return response()->json(['success' => true, 'message' => 'New records created successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to create new records', 'error' => $e->getMessage()], 500);
        }
    }
}
