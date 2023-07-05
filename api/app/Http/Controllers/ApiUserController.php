<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Controllers\company_detail;
use App\Models\service_detail;
use App\Models\maintable;
use App\Models\user_detail;

class ApiUserController extends Controller
{
    protected $userData;

    public function __construct(Request $request)
    {
        // This check is for fetching data from api using remember_token
        if ($request->header('Authorization')) {
            $remember_token = $request->header('Authorization');

            $user = user_detail::where('remember_token', $remember_token)->first();

            if ($user) {
                $this->userData = $user;
            }
        }
    }
    //home page
    public function listdetail(Request $request)
    {
        $db_company = DB::table('company_detail')->get();
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->select('service_detail.*', 'service_cate.category')
            ->get();

        return response()->json(
            [
                'company_detail' => $db_company,
                'service_detail' => $db_service,
            ],
            200,
        );
    }
    //add new user
    function addNewUser(Request $req)
    {
        $req->validate([
            'user_fname' => 'required',
            'user_lname' => 'required',
            'user_email' => 'required|unique:user_detail',
            'user_number' => 'required',
            'user_password' => 'required|min:8',
            'user_address' => 'required',
            'user_gender' => 'required',
        ]);

        $r_user = new user_detail();
        $r_user->user_fname = $req->user_fname;
        $r_user->user_lname = $req->user_lname;
        $r_user->user_email = $req->user_email;
        $r_user->user_number = $req->user_number;
        $r_user->user_password = Hash::make($req->user_password);
        $r_user->user_address = $req->user_address;
        $r_user->user_gender = $req->user_gender;

        $res_user = $r_user->save();

        if ($res_user) {
            return response()->json(['addNewUser' => 'success'], 200);
        } else {
            return response()->json(['addNewUser' => 'failure'], 400);
        }
    }
    //list all of the company page on User's side
    function listallcompany()
    {
        $db_company = DB::table('company_detail')->get();

        return response()->json(
            [
                'company_detail' => $db_company,
            ],
            200,
        );
    }
    //list all of the servicepage on User's side
    function listallservice()
    {
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->paginate(6);

        return response()->json(
            [
                'service_detail' => $db_service,
            ],
            200,
        );
    }

    
}
