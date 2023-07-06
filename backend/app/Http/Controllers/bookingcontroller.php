<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\admin_table;

class bookingcontroller extends Controller
{


    public function booking_data()
    {
        $data = array(); // Create an empty array to store the data.
        if (Session::has('loginID')) { // Check if the 'loginID' key exists in the session.
            // Retrieve the admin data from the 'admin_table' based on the 'admin_id' stored in the session.
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        // Retrieve booking details from the database and join multiple tables
        $db_booking = DB::table('booking_detail')
            ->join('service_detail', 'booking_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select(
                'booking_detail.*',
                'service_detail.service_name',
                'company_detail.company_name'
            )->paginate(9);
        // Pass the logged-in admin data and the booking details to the 'book_info' view
        return view('bookinfo.book_info', compact('data'), ['book_detail' => $db_booking]);
    }

    // function for the canceling button when click it will change the status of the booking to cancel.
    public function cancel_booking(Request $req)
    {
        $book_id = $req->book_id;

        $db_booking = book_table::find($book_id);
        $db_booking->status = 2;
        $db_booking->save();

        return redirect()->back()->with('success', 'Booking has been canceled successfully.');
    }

    // function for complete button when click it will change the status of the booking to completed status.
    public function complete_booking(Request $req)
    {
        $book_id = $req->book_id;

        $db_booking = book_table::find($book_id);
        $db_booking->status = 1;
        $db_booking->save();

        return redirect()->back()->with('success', 'Booking has been completed.');
    }
}
