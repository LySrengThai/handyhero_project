<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceDetail;
use App\Models\company_detail;
use Illuminate\Support\Facades\DB;

class ApiCompanyController extends Controller
{
    protected $userData;

    public function __construct(Request $request)
    {
        // This check is for fetching data from api using api_token
        if ($request->header('Authorization')) {
            $remember_token = $request->header('Authorization');

            $user = company_detail::where('remember_token', $remember_token)->first();

            if ($user) {
                $this->userData = $user;
            }
        }
    }
    public function listing(Request $req)
    {
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.company_id', $this->userData->company_id)
            ->get();

        $db_booking = DB::table('booking_detail')
            ->join('user_detail', 'booking_detail.user_id', '=', 'user_detail.user_id')
            ->join('service_detail', 'booking_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select('booking_detail.*', 'user_detail.user_lname', 'user_detail.user_fname', 'user_detail.user_number', 'user_detail.user_email', 'user_detail.user_address', 'service_detail.service_name')
            ->where('service_detail.company_id', $this->userData->company_id)
            ->paginate(10);

        $db_cate = DB::table('service_cate')->get();

        // Exclude the 'password' field from the 'company_detail' table
        $db_service = $db_service->map(function ($item) {
            unset($item->password);
            return $item;
        });

        return response()->json(
            [
                'services' => $db_service,
                'bookings' => $db_booking,
                'category' => $db_cate,
            ],
            200,
        );
    }

    public function serviceInsert(Request $req)
    {
        $i_book = new ServiceDetail();
        $i_book->service_name = $req->servicename;
        $i_book->service_description = $req->serdescription;
        $i_book->service_price = $req->serviceprice;
        $i_book->cate_id = $req->category;
        $i_book->company_id = $this->userData->company_id;

        $insert_book = $i_book->save();

        if ($insert_book) {
            return response()->json(
                [
                    'message' => 'Service have registered successfully',
                ],
                200,
            );
            // return back()->with('success', 'Service have registered successfully');
        } else {
            return response()->json(
                [
                    'message' => 'Something went wrong',
                ],
                400,
            );
            // return back()->with('fail', 'Something went wrong');
        }
    }
    function addNewCompany(Request $request)
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
            'description' => $description,
        ]);

        if ($isInsertSuccess) {
            return response()->json(['addNewCompany' => 'success'], 200);
        } else {
            return response()->json(['addNewCompany' => 'failure'], 400);
        }
    }

    public function bookingdisplay(Request $req)
    {
        $company_data = [];

        // Remove the session check and retrieval of company data

        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.company_id', $req->input('companyID')) // Use the value from the request instead of session
            ->get();

        $db_booking = DB::table('booking_detail')
            ->join('service_detail', 'booking_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select('booking_detail.*', 'service_detail.service_name')
            ->where('service_detail.company_id', $req->input('companyID')) // Use the value from the request instead of session
            ->paginate(10);

        $db_cate = DB::table('service_cate')->get();

        return view('company.companypage', compact('company_data'), [
            'services' => $db_service,
            'bookings' => $db_booking,
            'category' => $db_cate,
        ]);
    }
}
