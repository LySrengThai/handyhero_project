<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maintable;
use Illuminate\Support\Facades\DB;

class maincontroller extends Controller
{
    public function listdetail()
    {
        $db_company = DB::table('company_detail')->get();
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();

        return view('userpage.home', [
            'companydetail' => $db_company,
            'servicedetail' => $db_service
        ]);
    }
    function service_listdetail()
    {
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();



        return view('userpage.service', [
            'servicedetail' => $db_service
        ]);
    }
}
