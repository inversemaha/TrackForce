<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use DB;

class CategoryController extends Controller
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

    public function setUpcategory(){
        return view('admin-pages.category.category-setup');
    }

    public function savecategory(Request $request){
        $category_name = $request->input('category_name');

        $category_array = array('category_name'=>$category_name);

        try {
            $save_status = DB::table('category_table')->insert($category_array);
        } catch (\Illuminate\Database\QueryException $ex) {
            $save_status = 0;
            $err = $ex->getMessage();
            //dd($ex->getMessage());

        }
        //return $category_array;

        if ($save_status) {

            return redirect('/admin/category/view-category')->with('success', 'Category Added Successfully');
        } else {
            return redirect('/admin/category/view-category')->with('decline', 'There was  a problem.' . $err);
        }

    }

    public function viewcategory(){
        $result['result'] = DB::table('category_table')
            ->get();

       // return $result;

        return view('admin-pages.category.view-category',$result);
    }

    public function editcategory($category_id){

        $result['result']=DB::table('category_table')
            ->where('category_id',$category_id)
            ->first();

        return view('admin-pages.category.edit-category',$result);
        //return $result;
    }

    public function editedSaveCategory(Request $request){

        $category_id=$request->input('category_id');
        $category=$request->input('category_name');

        $category_array=array('category_name'=>$category);


        try {
            $status=DB::table('category_table')
                ->where('category_id',$category_id)
                ->update($category_array);
            return redirect('/admin/category/view-category')->with('success',"Category Updated Successfully");

        } catch(\Illuminate\Database\QueryException $ex){
            //dd($ex->getMessage());
            return redirect('/admin/category/view-category')->with('decline',$ex->getMessage());
        }

    }

    public function deleteCategory($id)
    {
        $result = DB::table('category_table')
            ->where('category_id', $id)
            ->delete();

        print_r($result);
        return view('admin-pages.category.view-category', $result);
    }
}
