<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\company_detail;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CompanyControllerManagement extends Controller
{

    public function listing(Request $req)
    {

        $company_data = array();
        if (Session::has('companyID')) {
            $company_data = company_detail::where('company_id', '=', Session::get('companyID'))->first();
        }
        // //company_id should get from company login
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.company_id', Session::get('companyID'))
            ->get();

        $db_booking = DB::table('booking_detail')
            ->join('user_detail', 'booking_detail.user_id', '=', 'user_detail.user_id')
            ->join('service_detail', 'booking_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select(
                'booking_detail.*',
                'user_detail.user_lname',
                'user_detail.user_fname',
                'user_detail.user_number',
                'user_detail.user_email',
                'user_detail.user_address',
                'service_detail.service_name'
            )
            ->where('service_detail.company_id', Session::get('companyID'))
            ->paginate(10);

        $db_cate = DB::table('service_cate')->get();

        return view('company.companypage', compact('company_data'), [
            'services' => $db_service,
            'bookings' => $db_booking,
            'category' => $db_cate,
        ]);
    }

    public function serviceInsert(Request $req)
    {
        $i_book = new ServiceDetail();
        $i_book->service_name = $req->servicename;
        $i_book->service_description = $req->serdescription;
        $i_book->service_price = $req->serviceprice;
        $i_book->cate_id = $req->category;
        $i_book->company_id = $req->companyID;

        $insert_book = $i_book->save();

        if ($insert_book) {
            return back()->with('success', 'Service have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
