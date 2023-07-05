<?php

namespace App\Http\Controllers;

use App\Models\company_detail;
use Illuminate\Http\Request;
use App\Models\user_detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

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

//     public function user_loggedin(Request $req)
// {
//     $credentials = $req->validate([
//         'user_email' => 'required|email',
//         'user_password' => 'required',
//     ]);

//     if (Auth::attempt($credentials)) {
//         $user = Auth::user();
//         $token = $user->createToken('auth-token')->plainTextToken;
//         $req->session()->put('userID', $user->user_id);
//         return redirect('home')->with('token', $token);
//     } else {
//         return back()->with('fail', 'Invalid username or password.');
//     }
// }

    public function user_loggedin(Request $req)
    {

        $log = user_detail::where('user_email', '=', $req->user_email)->first();
        if ($log) {
            if (Hash::check($req->user_password, $log->user_password)) {
                $req->session()->put('userID', $log->user_id);

                return redirect('home');
            } else {
                return back()->with('fail', 'Invalid username or password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }
//     public function company_loggedin(Request $req)
// {
//     $credentials = $req->validate([
//         'company_email' => 'required|email',
//         'company_password' => 'required',
//     ]);

//     if (Auth::attempt($credentials)) {
//         $company = Auth::user();
//         $token = $company->createToken('auth-token')->plainTextToken;
//         $req->session()->put('loginID', $company->company_id);
//         return redirect('companypage')->with('token', $token);
//     } else {
//         return back()->with('fail', 'Invalid username or password.');
//     }
// }
    
    public function company_loggedin(Request $req)
    {

        $log = company_detail::where('company_email', '=', $req->company_email)->first();
        if ($log) {
            if (Hash::check($req->company_password === $log->company_password)) {
                $req->session()->put('loginID', $log->company_id);
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
        return redirect('/login');
    }




}
