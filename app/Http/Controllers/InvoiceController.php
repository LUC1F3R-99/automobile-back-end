<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function loadData(Request $request)
    {
        // Access original form data from the request
        $originalFormData = $request->input('originalFormData');

        // Store customer data in the session
        $request->session()->put('customerData', $originalFormData);

        // Attach a success message to the redirect
        return response()->json(['success' => true, 'message' => 'Data passed to invoice']);
    }
}
