<?php

namespace App\Http\Controllers;

use App\User;
use App\Institute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $login_session = $request->session()->get('user_id');
            $user_type = $request->session()->get('user_type');

            if ($login_session != NULL && $user_type == '1') {
                return redirect('/admin-home')->send();
            } else if ($login_session != NULL && $user_type == '2') {
                return redirect('/user-home')->send();
            }
            return $next($request);
        });
    }

    public function login()
    {
        return view('login');
    }

    public function loginCheck(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        //$result=DB::table('users')->where('username', $username)->where('password', $password)->first();
        $result = User::where('username', $username)->where('password', $password)->first();
        if ($result) {

            $request->session()->put('user_id', $result->user_id);
            $request->session()->put('fullname', $result->fullname);
            $request->session()->put('email', $result->email);
            $request->session()->put('phone', $result->phone);

            $request->session()->put('user_type', $result->user_type);
            $request->session()->put('status', $result->status);


            if ($result->user_type == '1') {
                //Super Admin
                return redirect('/admin-home')->send();
            } else if ($result->user_type == '2') {
                return redirect('/user-home')->send();

            }

        } else {
            return Redirect('/login')->with('status', 'decline');
        }


    }
}
