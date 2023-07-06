<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\admin_table;

class companycontroller extends Controller
{
    public function company_data(Request $req)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $search = $req['search'] ?? "";
        if ($search != "") {
            $db_company = DB::table('company_detail')
            ->where('company_name', 'LIKE', "%$search%")
            ->paginate(8)->appends(['search' => $search]);
        } else {
            $db_company = DB::table('company_detail')->paginate(8);
        }

        return view('companyinfo.company_info', compact('data', 'search'), ['company_detail' => $db_company]);
    }

    public function company_view($company_id)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_company = DB::table('company_detail')->where('company_id', $company_id)->get();
        return view('companyinfo.company_view', compact('data'), ['company_detail' => $db_company]);
    }

    public function companyinfo_update(Request $req)
    {
        $company_id = $req->company_id;

        $req->validate([
            'companyname' => 'required',
            'description' => 'required',
            'company_phone' => 'required',
            'company_email' => 'required|email',
            'company_address' => 'required',
        ]);

        $db_company = company_table::find($company_id);
        $db_company->company_name = $req->companyname;
        $db_company->company_number = str_replace('-', '', $req->company_phone);
        $db_company->company_email = $req->company_email;
        $db_company->company_address = $req->company_address;
        $db_company->description = $req->description;

        $db_company->save();

        return redirect('/company_info')->with('success', 'Data has been updated');
    }

    public function company_del($company_id)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }
        
        $db_company = DB::table('company_detail')->where('company_id', $company_id)->get();
        return view('companyinfo.company_delete', compact('data'), ['company_detail' => $db_company]);
    }

    public function delete_company(Request $req)
    {
        $company_id = $req->company_id;
        $db_company = DB::table('company_detail')->where('company_id', $company_id)->delete();
        return redirect('/company_info')->with('fail', 'Company Blocked');
    }
}
