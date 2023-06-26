<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\receipt_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\admin_table;

class receiptcontroller extends Controller
{
    public function receipt_data()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_receipt = DB::table('receipt_detail')
            ->join('user_detail', 'receipt_detail.user_id', '=', 'user_detail.user_id')
            ->join('service_detail', 'receipt_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select(
                'receipt_detail.*',
                'user_detail.user_lname',
                'user_detail.user_fname',
                'service_detail.service_name',
                'company_detail.company_name',
            )
            ->paginate(10);
        return view('receiptinfo.receipt_info', compact('data'), ['receipt_detail' => $db_receipt]);
    }

    public function receipt_view($receipt_id)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_receipt = DB::table('receipt_detail')
            ->join('user_detail', 'receipt_detail.user_id', '=', 'user_detail.user_id')
            ->join('service_detail', 'receipt_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->join('booking_detail', 'receipt_detail.service_id', '=', 'booking_detail.service_id')
            ->select(
                'receipt_detail.*',
                'user_detail.user_lname',
                'user_detail.user_fname',
                'user_detail.user_number',
                'user_detail.user_email',
                'user_detail.user_address',
                'service_detail.service_name',
                'booking_detail.booking_date',
                'company_detail.company_name'
            )->where('receipt_detail.receipt_id', $receipt_id)->get();

        return view('receiptinfo.receipt_view', compact('data'), ['receipt_detail' => $db_receipt]);
    }
}
