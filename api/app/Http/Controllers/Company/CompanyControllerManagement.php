<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\company_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyControllerManagement extends Controller
{
   
    public function listing(Request $req)
    {

        $com_id = 1;
        //company_id should get from company login
        $services = DB::table('service_detail')
                ->where('company_id',$com_id)
                ->get();
        
        $bookings = Booking::get();
        return view('company.companypage', [
            'services' => $services,
            'bookings' => $bookings
        ]);
    }
}
