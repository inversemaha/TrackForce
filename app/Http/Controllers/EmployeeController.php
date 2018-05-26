<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use DB;

class EmployeeController extends Controller
{
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

    public function addEmployee()
    {
        return view('admin-pages.employee.add-employee');
    }

    public function saveEmployee(Request $request)
    {

        $username = $request->input('username');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $designation = $request->input('designation');
        $user_type ='2';
        $blood_group = $request->input('blood_group');
        $password = $request->input('password');
        $active_status = 1;  //Status 1is active, 0 is deactive


        //Upload Image

        if ($request->hasFile('input_img')) {
            $this->validate($request, [

                'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $image = $request->file('input_img');

            $emp_img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/employee-image');
            $image->move($destinationPath, $emp_img);
        } else {
            $emp_img = "default.jpg";
        }


       // return $emp_img;
        $emp_array = array('username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'user_type' => $user_type,
            'imageref' => $emp_img,
            'phone' => $phone,
            'designation' => $designation,
            'blood_group' => $blood_group,
            'password' => $password,
            'active_status' => 1

        );

        //return $emp_array;

        try {
            $save_status = DB::table('users')->insert($emp_array);
        } catch (\Illuminate\Database\QueryException $ex) {
            $save_status = 0;
            $err = $ex->getMessage();
            //dd($ex->getMessage());

        }
        //return $emp_array;

        if ($save_status) {

            return redirect('/admin/employee/view-employee')->with('success', 'Employee addedd sucessfully');
        } else {
            return redirect('/admin/employee/view-employee')->with('decline', 'There was  a problem.' . $err);
        }

    }

    public function viewEmployee()
    {
        $active_status=1;
        $result['result'] = DB::table('users')
            ->where('active_status',$active_status)
            ->get();

        //return ($result);
        return view('admin-pages.employee.view-employee', $result);
    }

    public function archieveEmployee()
    {
        $active_status=0;
        $result['result'] = DB::table('users')
            ->where('active_status',$active_status)
            ->get();

        //return ($result);
        return view('admin-pages.employee.archive-employee', $result);
    }

    public function editEmployee($id)
    {
        $result = DB::table('users')
            ->where('user_id', $id)
            ->first();
        //return $result;
        return view('admin-pages.employee.edit-employee')
            ->with('result', $result);
    }

    public function employeeActivateStatusChange($id, $active_status)
    {
        if ($active_status == 0) {
            $active_status = 1;
        } else {
            $active_status = 0;
        }
        $edit_emp_array = array('active_status' => $active_status);
        try {

            $edit_save_status = DB::table('users')->where('user_id', $id)->update($edit_emp_array);
            return redirect('/admin/employee/view-employee')->with('success', 'Employee Deactivated successfully');

        } catch (QueryException $ex) {
            $msg = $ex->getMessage();
            return view('/admin/employee/view-employee')->with('decline', $msg);
        }
    }

/*    public function deleteEmployee($id)
    {


        $result = DB::table('employee_table')
            ->where('emp_id', $id)
            ->delete();

        //print_r($result);
        return view('admin_pages.employee.view_employee', $result);
    }*/

    public function saveEditedEmployee(Request $request)
    {
        $username = $request->input('username');
        $fullname = $request->input('fullname');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $designation = $request->input('designation');
        $user_id = $request->input('user_id');
        $user_type = '2';
        $blood_group = $request->input('blood_group');
        $password = $request->input('password');
        $emp_img = $request->input('imageref');

        $active_status = 1;  //Status 1is active, 0 is deactive


        //Upload Image

        if ($request->hasFile('input_img')) {
            $this->validate($request, [

                'input_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $image = $request->file('input_img');

            $emp_img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/employee-image');
            $image->move($destinationPath, $emp_img);
        } else {
            $emp_img = $emp_img;
        }


        // return $emp_img;
        $edit_emp_array = array('username' => $username,
            'fullname' => $fullname,
            'email' => $email,
            'user_type' => $user_type,
            'imageref' => $emp_img,
            'phone' => $phone,
            'designation' => $designation,
            'blood_group' => $blood_group,
            'password' => $password,
            'active_status' => 1

        );

        //return $emp_array;

        try {

            $edit_save_status = DB::table('users')->where('user_id', $user_id)->update($edit_emp_array);
            return redirect('/admin/employee/view-employee')->with('success', 'Employee Updated Successfully');

        } catch (QueryException $ex) {
            $msg = $ex->getMessage();
            return view('/admin/employee/view-employee')->with('decline', $msg);
        }


    }

   public function employeeProfile($id)
    {

        $result['result'] = DB::table('users')
            ->where('user_id', $id)
            ->first();
        //return $result;

        //print_r($result);
        return view('admin-pages.employee.employee-profile', $result);
    }

}
