<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function loadData(Request $request)
    {
        // Access form data using $request
        $formData = $request->all();

        // Pass data to the view and return it
        // return view('service-jobs')->with('formData', $formData);
    }
}
