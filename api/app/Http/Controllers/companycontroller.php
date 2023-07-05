<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maintable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class companycontroller extends Controller
{
    public function list_companydetail($company_id)
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $db_company = DB::table('company_detail')
            ->where('company_detail.company_id', $company_id)
            ->first();

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.company_id', $company_id)
            ->get();

        return view('userpage.company_detail', compact('user_data'), [
            'companydetail' => $db_company,
            'servicedetail' => $db_service
        ]);
    }

    public function list_servicedetail($service_id)
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.service_id', $service_id)
            ->first();

        return view('userpage.service_detail', compact('user_data'), [
            'servicedetail' => $db_service
        ]);
    }

    //for api
    public function companylistdetail()
    {
        $db_company = DB::table('company_detail')->get();

        return view('userpage.company', [
            'companydetail' => $db_company
        ]);
    }
    public function homepage(){
        return view('userpage.homepage');
    }
    public function displaycompanydetail($id)
    {
        $row = DB::table('company_detail')->where('company_detail.company_id' ,'=',$id)->get();
        return view('userpage.company_detail', compact('row'));
    }
}
