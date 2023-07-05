<?php

namespace App\Http\Controllers;

use App\Models\user_detail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\company_detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;



class logincontroller extends Controller
{
    public function company_login()
    {

        return view('company_login');
    }
    public function user_login()
    {
        return view('userpage.login');
    }

    public function user_loggedin(Request $req)
    {

        $log = user_detail::where('user_email', '=', $req->user_email)->first();
        if ($log) {
            if (Hash::check($req->user_password, $log->user_password)) {
                $req->session()->put('userID', $log->user_id);

                // dd(Session('userID'));
                do {
                    $token = Str::random(80);
                } while (user_detail::where('remember_token', $token)->first());

                user_detail::where('user_id',Session('userID'))->update([
                    'remember_token' => $token
                ]);

                return redirect('home');
            } else {
                return back()->with('fail', 'Invalid username or password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }
    
    public function company_loggedin(Request $req)
    {

        $log = company_detail::where('company_email', '=', $req->company_email)->first();
        if ($log) {
            if (Hash::check($req->company_password, $log->company_password)) {
                $req->session()->put('companyID', $log->company_id);

                do {
                    $token = Str::random(80);
                } while (company_detail::where('remember_token', $token)->first());

                company_detail::where('company_id',Session('companyID'))->update([
                    'remember_token' => $token
                ]);

                return redirect('companypage');
            } else {
                return back()->with('fail', 'Invalid username or password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('/homepage');
    }
}
