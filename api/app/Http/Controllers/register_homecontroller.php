<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_detail;
use Illuminate\Support\Facades\Hash;

class register_homecontroller extends Controller
{
    function register_homeIndex()
    {
        return view('register-provider');
    }

    //insert data into dtb function
    function register_DataInsert(Request $req)
    {
        $req->validate([
            'user_fname' => 'required',
            'user_lname' => 'required',
            'user_email' => 'required|unique:user_detail',
            'user_number' => 'required',
            'user_password' => 'required|min:8',
            'user_address' => 'required',
            'user_gender' => 'required'
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

        if($res_user){
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong');
        }
    }

}
