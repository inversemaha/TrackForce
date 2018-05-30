<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;

class HomeController extends Controller
{

    //This constructor will check everytime is our user already logged in or not.
    //If login status is logout then it will redirect user to login page.
    //We have to put this controller in every controller except Login controller

    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $user_id = $request->session()->get('user_id');
            if ($user_id == NULL) {
                return redirect::to('/login')->send();
            }
            return $next($request);
        });
    }

    public function logout()
    {
        session()->forget('user_id');
        session()->forget('username');
        session()->forget('user_type');
        session()->forget('email');
        session()->forget('designation');
        session()->forget('fullname');
        session()->flush();
        return Redirect::to('/login')->send();

    }

    public function adminHome()
    {
        return view('admin-pages.admin-home');

    }
    public function adminSetting()
    {
        $user_id =  Session('user_id');
        $result=DB::table('users')->where('user_id',$user_id)->first();
        return view('admin-pages.setting')->with('result',$result);

    }
    public function adminSaveEditedData(Request $request)
    {
        $user_id=$request->input('user_id');
        $fullname=$request->input('fullname');
        $email=$request->input('email');
        $password=$request->input('password');
        $user_array=array('fullname'=>$fullname,'email'=>$email,'password'=>$password);
        $result=DB::table('users')->where('user_id',$user_id)->update($user_array);
        return back()->with('success',"Data updated");

    }

}
