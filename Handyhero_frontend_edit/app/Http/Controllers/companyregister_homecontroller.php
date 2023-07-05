<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_detail;
use Illuminate\Support\Facades\Hash;

class companyregister_homecontroller extends Controller
{
    function companyregister_homeIndex()
    {
        return view('userpage.register_provider');
    }
    function companyregister_DataInsert(Request $req)
    {
        $req->validate([
            'company_name' => 'required|unique:company_detail',
            'company_email' => 'required|unique:company_detail',
            'company_number' => 'required',
            'company_password' => 'required|min:8',
            'company_address' => 'required',
            'company_description' => 'required'
        ]);

        $r_company = new company_detail();
        $r_company->company_name = $req->company_name;
        $r_company->company_email = $req->company_email;
        $r_company->company_number = $req->company_number;
        $r_company->company_password = Hash::make($req->company_password);
        $r_company->company_address = $req->company_address;
        $r_company->description = $req->company_description;

        $res_company = $r_company->save();

        if ($res_company) {
            return back()->with('success', 'You have registered company successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
