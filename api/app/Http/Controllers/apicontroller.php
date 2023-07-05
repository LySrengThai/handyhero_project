<?php

namespace App\Http\Controllers;

use App\Models\maintable;
use App\Models\user_detail;
use Illuminate\Http\Request;
use App\Models\service_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\company_detail;

class apicontroller extends Controller
{
    
    //====================================================================== 
    public function listdetail(Request $request)
    {

        $db_company = DB::table('company_detail')->get();
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();

        return response()->json([
            "company_detail" => $db_company,
            "service_detail" => $db_service
        ], 200);
    }
    //====================================================================== 
    public function homepage_listdetail()
    {
        $db_company = DB::table('company_detail')->get();
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();
    
        return response()->json([
            "company_detail" => $db_company,
            "service_detail" => $db_service
        ], 200);
    }  
    //====================================================================== 
    //company controller
    public function companylistdetail(Request $request)
    {
        $db_company = DB::table('company_detail')->get();

        return response()->json([
            "company_detail" => $db_company
        ], 200);
    }
    //======================================================================
    //api for adding data
    function addcompanyregister_DataInsert(Request $request)
    {
        $company_name = $request->input('company_name');
        $company_email = $request->input('company_email');
        $company_number = $request->input('company_number');
        $company_address = $request->input('company_address');
        $company_password = $request->input('company_password');
        $description = $request->input('description');

        $isInsertSuccess = DB::table('company_detail')->insert([
            'company_name' => $company_name,
            'company_email' => $company_email,
            'company_number' => $company_number,
            'company_address' => $company_address,
            'company_password' => $company_password,
            'description' => $description
    ]);

       if($isInsertSuccess) 
       { return response()->json(["companyregister_DataInsert" => 'success'], 200);} 
       else 
       { return response()->json(["companyregister_DataInsert" => 'failure'], 400);}
    }
    //====================================================================== 
    //api for updating company's information
    function updatecompanyregister_DataInsert(Request $request)
    {
        $company_name = $request->input('company_name');
        $company_email = $request->input('company_email');
        $company_number = $request->input('company_number');
        $company_address = $request->input('company_address');
        $company_password = $request->input('company_password');
        $description = $request->input('description');

        $isInsertSuccess = DB::table('company_detail')
        ->where('company_email', $company_email) // Assuming 'company_email' is a unique identifier
        ->update([
            'company_name' => $company_name,
            'company_number' => $company_number,
            'company_address' => $company_address,
            'company_password' => $company_password,
            'description' => $description
        ]);

        if ($isInsertSuccess) 
        {return response()->json(["companyregister_DataInsert" => 'success'], 200); } 
        else 
        {return response()->json(["companyregister_DataInsert" => 'failure'], 400); }
    }
   
    //======================================================================
    //get data for all existing services
    public function service_listdetail()
    {
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();



        return response()->json([
            'servicedetail' => $db_service
        ],200);
    }
    
}
