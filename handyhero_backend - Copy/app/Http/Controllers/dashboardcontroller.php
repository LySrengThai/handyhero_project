<?php

namespace App\Http\Controllers;

use App\Models\admin_table;
use App\Models\book_table;
use App\Models\company_table;
use App\Models\receipt_table;
use App\Models\service_table;
use App\Models\user_table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class dashboardcontroller extends Controller
{
    //

    public function dashboardIndex()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $totaluser = user_table::count();
        $totalcompany = company_table::count();
        $totalservice = service_table::count();

        $thisMonth = Carbon::now()->format('m');
        $thisMonthBook = book_table::whereMonth('created_at', $thisMonth)->count();

        $thisMonthSum = receipt_table::whereMonth('created_at', $thisMonth)->sum('receipt_price');

        $lastMonth = Carbon::now()->subMonth();
        $lastMonthSum = receipt_table::whereMonth('created_at', $lastMonth->month)->sum('receipt_price');


        $db_user = DB::table('user_detail')->latest()->limit(6)->get();

        return view('dashboard', compact('data', 'totaluser', 'totalcompany', 'totalservice', 'thisMonthBook', 'thisMonthSum', 'lastMonthSum'), ['user_detail' => $db_user]);
    }
}
