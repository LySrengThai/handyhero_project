<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\maintable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BookingController extends Controller
{
    public function store(Request $request, $service_id)
    {
       
        $validatedData = $request->validate([
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'number' => 'required|string',
            'book_date' => 'required|date',
        ]);

        
        $validatedData['service_id'] = $service_id;
        $validatedData['status'] = 0;
      
        
        Booking::create($validatedData);

        // You can add a success message or redirect the user to another page after the booking is saved.
        return redirect()->back()->with('success', 'Booking successful!');
    }  
}



