<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function loadData(Request $request)
    {
        // Access form data using $request
        $formData = $request->all();

        // Store data in the session
        $request->session()->put('formData', $formData);

    }
}
