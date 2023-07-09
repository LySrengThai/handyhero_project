<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Cat;
use App\Models\company_detail;
use App\Models\ServiceDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CompanyControllerManagement extends Controller
{

    public function listing(Request $req)
    {

        $company_data = array();
        if (Session::has('companyID')) {
            $company_data = company_detail::where('company_id', '=', Session::get('companyID'))->first();
        }
        // //company_id should get from company login
        $db_service = DB::table('service_detail')
            ->join('service_cate', 'service_cate.cate_id', '=', 'service_detail.cate_id')
            ->join('company_detail', 'company_detail.company_id', '=', 'service_detail.company_id')
            ->select('service_detail.*', 'service_cate.category', 'company_detail.company_name')
            ->where('service_detail.company_id', Session::get('companyID'))
            ->get();

        $db_booking = DB::table('booking_detail')
            ->join('service_detail', 'booking_detail.service_id', '=', 'service_detail.service_id')
            ->join('company_detail', 'service_detail.company_id', '=', 'company_detail.company_id')
            ->select(
                'booking_detail.*',
                'service_detail.service_name'
            )
            ->where('service_detail.company_id', Session::get('companyID'))
            ->paginate(10);

        $db_cate = DB::table('service_cate')->get();

        return view('company.companypage', compact('company_data'), [
            'services' => $db_service,
            'bookings' => $db_booking,
            'category' => $db_cate,
        ]);
    }

    public function serviceInsert(Request $req)
    {
        $i_book = new ServiceDetail();
        $i_book->service_name = $req->servicename;
        $i_book->service_description = $req->serdescription;
        $i_book->service_price = $req->serviceprice;
        $i_book->cate_id = $req->category;
        $i_book->company_id = $req->companyID;

        $insert_book = $i_book->save();

        if ($insert_book) {
            return back()->with('success', 'Service have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
    public function ServiceEdit($service_id)
    {
        $service = ServiceDetail::find($service_id);
        $category = Cat::all();
        return view('company.companyserviceedit', [
            'service' => $service,
            'category' => $category
        ]);
    }
    public function ServiceUpdate(Request $request, ServiceDetail $service)
    {
        $validatedData = $request->validate([
            'servicename' => 'required',
            'category' => 'required',
            'serviceprice' => 'required|numeric',
            'serdescription' => 'required',
        ]);

        $service->service_name = $validatedData['servicename'];
        $service->cate_id = $validatedData['category'];
        $service->service_price = $validatedData['serviceprice'];
        $service->service_description = $validatedData['serdescription'];

        $service->save();
        if ($service) {
            return redirect()->route('companypage')->with('success', 'Service updated successfully');
        } else {
            return back()->with('fail', 'Please fill the corect format form.');
        }
    }
    public function Servicedestroy($service_id)
    {
        try {
            // Find the service by ID and delete it
            $service = ServiceDetail::findOrFail($service_id);
            $service->delete();
    
            // Redirect back with success message
            return redirect()->back()->with('success', 'Service deleted successfully.');
        } catch (\Exception $e) {
            // Redirect back with error message
            return redirect()->back()->with('fail', 'Failed to delete service.');
        }
    }
    public function CompanyEdit($company_id)
    {
        $company = company_detail::find($company_id);
        return view('company.companyedit', [
            'company' => $company
        ]);
       
    }
    public function CompanyUpdate(Request $request, company_detail $company)
    {
        $validatedData = $request->validate([

            'description' => 'required',
        ]);
        $company->description = $validatedData['description'];
        $company->save();
        if ($company) {
            return redirect()->route('companypage')->with('success', 'Company Description updated successfully');
        } else {
            return back()->with('fail', 'Please fill the corect format form.');
        }
    }
   
}
