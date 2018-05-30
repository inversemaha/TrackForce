<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Redirect;
use DB;

class ProductController extends Controller
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

    public function addProduct()
    {
        return view('admin-pages.product.add-product');
    }

    public function saveProduct(Request $request){
        $product_name = $request->input('product_name');
        $product_image = $request->input('product_image');
        $product_size = $request->input('product_size');
        $price = $request->input('price');
        $status='1';


        //Upload Image

        if ($request->hasFile('input_product_img')) {
            $this->validate($request, [

                'input_product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $image = $request->file('input_product_img');

            $product_image = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/product-image');
            $image->move($destinationPath, $product_image);
        } else {
            $product_image = $product_image;
        }

        $product_array = array('product_name' => $product_name,
            'product_image' => $product_image,
            'product_size' => $product_size,
            'price' => $price,
            'status'=>$status

            );

        try {
            $save_product = DB::table('product_table')->insert($product_array);
        } catch (\Illuminate\Database\QueryException $ex) {
            $save_product = 0;
            $err = $ex->getMessage();
            //dd($ex->getMessage());

        }
        //return $product_array;

        if ($save_product) {

            return redirect('/admin/product/view-product')->with('success', 'Product Added Successfully');
        } else {
            return redirect('/admin/product/view-product')->with('decline', 'There was  a problem.' . $err);
        }
    }

    public function viewProduct(){
        $status=1;
        $result['result'] = DB::table('product_table')
            ->where('status',$status)
            ->get();

        //return ($result);
        return view('admin-pages.product.view-product', $result);
    }

    public function archiveProduct()
    {
        $status=0;
        $result['result'] = DB::table('product_table')
            ->where('status',$status)
            ->get();

        //return ($result);
        return view('admin-pages.product.achieve-product', $result);
    }

    public function editProduct($id)
    {
        $result = DB::table('product_table')
            ->where('product_id', $id)
            ->first();
        //return $result;
        return view('admin-pages.product.edit-product')
            ->with('result', $result);
    }

    public function productActivateStatusChange($id, $status)
    {
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $edit_product_array = array('status' => $status);
        try {

            $edit_save_status = DB::table('product_table')->where('product_id', $id)->update($edit_product_array);
            return redirect('/admin/product/view-product')->with('success', 'Product Deactivated successfully');

        } catch (QueryException $ex) {
            $msg = $ex->getMessage();
            return view('/admin/product/view-product')->with('decline', $msg);
        }
    }

    public function saveEditedProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_image = $request->input('product_image');
        $product_size = $request->input('product_size');
        $price = $request->input('price');
        $status='1';


        //Upload Image

        if ($request->hasFile('input_product_img')) {
            $this->validate($request, [

                'input_product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);
            $image = $request->file('input_product_img');

            $product_image = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/product-image');
            $image->move($destinationPath, $product_image);
        } else {
            $product_image = $product_image;
        }

        $edit_product_array = array('product_name' => $product_name,
            'product_image' => $product_image,
            'product_size' => $product_size,
            'price' => $price,
            'status'=>$status

        );


        try {

            $edit_save_status = DB::table('product_table')->where('product_id', $product_id)->update($edit_product_array);
            return redirect('/admin/product/view-product')->with('success', 'Product Updated Successfully');

        } catch (QueryException $ex) {
            $msg = $ex->getMessage();
            return view('/admin/product/view-product')->with('decline', $msg);
        }


    }
}
