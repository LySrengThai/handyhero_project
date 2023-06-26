<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin_table;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller
{

    // function to view to the admin login page
    public function login()
    {
        return view('admin_login');
    }

    // function to check the username and password if it correct to the data in the database
    public function loggedin(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $log = admin_table::where('admin_name', '=', $req->username)->first();
        if ($log) {
            if (Hash::check($req->password, $log->admin_password)) {
                $req->session()->put('loginID', $log->admin_id);
                return redirect('dashboard');
            } else {
                return back()->with('fail', 'Invalid username or password.');
            }
        } else {
            return back()->with('fail', 'This username is not registered.');
        }
    }

    // function for logout to clear all data from the session during the login
    public function logout()
    {
        Session::flush();
        return redirect('admin_login');
    }

    public function admin_register()
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }
        return view('admin_register', compact('data'));
    }

    public function registeradmin(Request $req)
    {
        $req->validate([
            'admin_name' => 'required|unique:admin_detail,admin_name',
            'admin_password' => 'required'
        ]);

        $r_admin = new admin_table();
        $r_admin->admin_name = $req->admin_name;
        $r_admin->admin_password = Hash::make($req->admin_password);
        $r_admin->created_by = $req->logged_in_user;

        $res = $r_admin->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }
}
