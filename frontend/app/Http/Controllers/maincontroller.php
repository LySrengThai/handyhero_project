<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maintable;
use App\Models\ServiceDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class maincontroller extends Controller
{
    public function listdetail()
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $db_company = DB::table('company_detail')->inRandomOrder()->take(12)->get();

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->inRandomOrder()->take(6)->get();

        return view('userpage.home', compact('user_data'), [
            'companydetail' => $db_company,
            'servicedetail' => $db_service
        ]);
    }

    function service_listdetail()
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->paginate(6);

        return view('userpage.service', compact('user_data'), [
            'servicedetail' => $db_service
        ]);
    }

    function company_listdetail()
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $db_company = DB::table('company_detail')->paginate(12);

        return view('userpage.company', compact('user_data'), [
            'companydetail' => $db_company
        ]);
    }

    function contactUS()
    {
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        return view('userpage.contactus', compact('user_data'));
    }

    public function bookService(){
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        return view('userpage.booking', compact('user_data'));
    }

    public function userSetting(){
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        return view('userpage.acc_setting', compact('user_data'));
    }
    public function show($service_id){
 
        $user_data = array();
        if (Session::has('userID')) {
            $user_data = maintable::where('user_id', '=', Session::get('userID'))->first();
        }

        $servicedetail = ServiceDetail::find($service_id);
        
        return view('userpage.booking', compact('servicedetail', 'user_data'));
        
    }
}
