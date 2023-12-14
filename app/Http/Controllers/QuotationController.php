<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function fetchAllData(Request $request){
        // Retrieve the data from the request
        $searchVehicleNumber = $request->input('searchVehicleNo');


    return response()->json([
        'searchVehicleNumber' => $searchVehicleNumber,
    ]);

    }
}
