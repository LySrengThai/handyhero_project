<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_detail;

class companyregister_homecontroller extends Controller
{
    function companyregister_homeIndex()
    {
        return view('userpage.home');

    }
    function companyregister_DataInsert(Request $request)
    {
        $company_name= $request -> input ('company_name');
        $company_email= $request -> input ('company_email');
        $company_number= $request -> input ('company_number');
        $company_address= $request -> input ('company_address');
        $company_password= $request -> input ('company_password');
        $company_description= $request -> input ('company_description');
        

        $isInsertSuccess = company_detail::insert ([ 'company_name' => $company_name,
                                                  'company_email' => $company_email,
                                                  'company_number' => $company_number,
                                                  'company_address' => $company_address,
                                                  'company_password' => $company_password,
                                                  'company_description' => $company_description                        
        ]);

        // test if it is successful
        if ($isInsertSuccess) echo '<h1>success</h1>';
        else echo '<h1>fail</h1>';

    }
}
