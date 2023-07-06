<?php

namespace App\Http\Controllers;

use App\Models\admin_table;
use Illuminate\Http\Request;
use App\Models\user_table;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class viewcontroller extends Controller
{
    public function user_data(Request $req)
    {
        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $search = $req['search'] ?? "";
        if ($search != "") {
            $db_user = DB::table('user_detail')
            ->where('user_fname', 'LIKE', "%$search%")
            ->orWhere('user_lname', 'LIKE', "%$search%")
            ->paginate(8)->appends(['search' => $search]);
        } else {
            $db_user = DB::table('user_detail')->paginate(8);
        }

        return view('userinfo.admin', compact('data', 'search'), ['user_detail' => $db_user]);
    }

    public function user_view($user_id)
    {

        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_user = DB::table('user_detail')->where('user_id', $user_id)->get();
        return view('userinfo.user_view', compact('data'), ['user_detail' => $db_user]);
    }

    public function userinfo_update(Request $req)
    {
        $user_id = $req->user_id;

        $req->validate([
            'gender' => 'required',
            'fname' => 'required',
            'lname' => 'required',
            'user_phone' => 'required',
            'user_email' => 'required|email',
            'user_address' => 'required',
        ]);

        $db_user = user_table::find($user_id);
        $db_user->user_gender = $req->gender;
        $db_user->user_fname = $req->fname;
        $db_user->user_lname = $req->lname;
        $db_user->user_number = str_replace('-', '', $req->user_phone);
        $db_user->user_email = $req->user_email;
        $db_user->user_address = $req->user_address;

        $db_user->save();

        return redirect('/user_info')->with('success', 'Data has been updated');
    }

    public function user_del($user_id)
    {

        $data = array();
        if (Session::has('loginID')) {
            $data = admin_table::where('admin_id', '=', Session::get('loginID'))->first();
        }

        $db_user = DB::table('user_detail')->where('user_id', $user_id)->get();
        return view('userinfo.delete_info', compact('data'), ['user_detail' => $db_user]);
    }

    public function delete_user(Request $req)
    {
        $user_id = $req->user_id;
        $db_user = DB::table('user_detail')->where('user_id', $user_id)->delete();
        return redirect('/user_info')->with('fail', 'User Blocked');
    }
}
