<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\service_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\admin_table;


class servicecontroller extends Controller
{
    public function service_data(Request $req)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $search = $req['search'] ?? "";

        if ($search != "") {
            $db_service = DB::table('service_detail')
                ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
                ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
                ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
                ->where('service_name', 'LIKE', "$search%")
                ->paginate(8)->appends(['search' => $search]);
        } else {
            $db_service = DB::table('service_detail')
                ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
                ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
                ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
                ->paginate(8);
        }

        return view('serviceinfo.service_view', compact('data', 'search'), ['service_detail' => $db_service]);
    }

    public function service_view($service_id)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.cate_id', 'company_detail.company_name')
            ->where('service_id', $service_id)
            ->get();

        $db_cate = DB::table('service_cate')->get();
        return view('serviceinfo.service_info', compact('data'), [
            'service_detail' => $db_service,
            'service_cate' => $db_cate
        ]);
    }

    public function serviceinfo_update(Request $req)
    {
        $service_id = $req->service_id;

        $req->validate([
            'servicename' => 'required',
            'serviceprice' => 'required',
            'category' => 'required',
            'servicedescription' => 'required',
        ]);

        $db_service = service_table::find($service_id);
        $db_service->service_name = $req->servicename;
        $db_service->service_price = str_replace(',', '', str_replace('៛', '', $req->serviceprice));
        $db_service->cate_id = $req->category;
        $db_service->service_description = $req->servicedescription;

        $db_service->save();

        return redirect('/service_info')->with('success', 'Data has been updated');
    }

    public function service_del($service_id)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_service = DB::table('service_detail')->where('service_id', $service_id)->get();
        return view('serviceinfo.service_delete', compact('data'), ['service_detail' => $db_service]);
    }

    public function delete_service(Request $req)
    {
        $service_id = $req->service_id;
        $db_service = DB::table('service_detail')->where('service_id', $service_id)->delete();
        return redirect('/service_info')->with('fail', 'Service Delete');
    }
}
