<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\maintable;
use Illuminate\Support\Facades\DB;

class companycontroller extends Controller
{
    public function companylistdetail()
    {
        $db_company = DB::table('company_detail')->get();

        return view('userpage.company', [
            'companydetail' => $db_company
        ]);
    }
}