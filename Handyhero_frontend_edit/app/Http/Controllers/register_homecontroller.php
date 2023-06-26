<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_detail;

class register_homecontroller extends Controller
{
    function register_homeIndex()
    {
        return view('register-provider');
    }

    //insert data into dtb function
    function register_DataInsert(Request $request)
    {
        $user_fname= $request -> input ('user_fname');
        $user_lname= $request -> input ('user_lname');
        $user_email= $request -> input ('user_email');
        $user_number= $request -> input ('user_number');
        $user_password= $request -> input ('user_password');
        $user_address= $request -> input ('user_address');
        $user_gender= $request -> input ('user_gender');

        $isInsertSuccess = user_detail::insert ([ 'user_fname' => $user_fname,
                                                  'user_lname' => $user_lname,
                                                  'user_email' => $user_email,
                                                  'user_number' => $user_number,
                                                  'user_password' => $user_password,
                                                  'user_address' => $user_address,
                                                  'user_gender' => $user_gender,

        ]);

        return redirect ('/login');
    }

}
