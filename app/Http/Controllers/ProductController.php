<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

use DB;
use Session;
session_start();

class ProductController extends Controller
{
    public function index(){
    	$this->adminAuthCheck();
    	return view('admin.add_product');
    }

    //Save Product
    public function save_product(Request $request){
    	$data=array();
    	$data['product_name']=$request->product_name;
    	$data['category_id']=$request->category_id;
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['product_short_description']=$request->product_short_description;
    	$data['product_long_description']=$request->product_long_description;
    	$data['product_price']=$request->product_price;
    	$data['product_size']=$request->product_size;
    	$data['product_color']=$request->product_color;
        $data['available_product']=$request->available_product;
    	$data['publication_status']=$request->publication_status;
    	if ($data['publication_status']==null) {
    		$data['publication_status']=0;
    	}

    	//image
    	$image=$request->file('product_image');
    	if ($image) {
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='images/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['product_image']=$image_url;

       				DB::table('tbl_products')->insert($data);
    				Session::put('message', 'Product Added Successfully');
    				return Redirect::to('/add-product');
    		}
    		else
    			$data['image']="";
    				DB::table('tbl_products')->insert($data);
    				Session::put('message', 'Product Added Successfully Without Image');
    				return Redirect::to('/add-product');
    	}
    }


    //Show Products
    public function all_product(){
    	$this->adminAuthCheck();
    	$all_product_info = DB::table('tbl_products')
                                    ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                                    ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
                                    ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                                    ->get();

    	return view('admin.all_product')
    		->with('all_product_info', $all_product_info);
    }

    //Publication Status of Products
    public function inactive_product($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status'=>0]);
        Session::put('inactive_message', 'Product inactived');
        return Redirect::to('/all-product');
    }

    public function active_product($product_id){
        DB::table('tbl_products')
            ->where('product_id', $product_id)
            ->update(['publication_status'=>1]);
        Session::put('active_message', 'Product actived');
        return Redirect::to('/all-product');
    }

    //Delete Products

    public function delete_product($product_id){
        $this->adminAuthCheck();
    	DB::table('tbl_products')
    		->where('product_id',$product_id)
    		->delete();
    	Session::put('inactive_message','Product Deleted Successfully!!');
    	return Redirect::to('/all-product');
    }

    //Edit Product

    public function edit_product($product_id){
        $this->adminAuthCheck();
        $productInfo = DB::table('tbl_products')
                ->where('product_id',$product_id)
                ->first();
        return view('admin.edit_product')
                ->with('productInfo',$productInfo);
    }

    public function update_product(request $request, $product_id)
    {
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['manufacture_id']=$request->manufacture_id;
        $data['product_short_description']=$request->product_short_description;
        $data['product_long_description']=$request->product_long_description;
        $data['product_price']=$request->product_price;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $image=$request->file('product_image');
        if ($image) {
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='images/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['product_image']=$image_url;

                    DB::table('tbl_products')
                            ->where('product_id',$product_id)
                            ->update($data);
                    Session::put('message', 'Product updated Successfully');
                    return Redirect::to('/all-product');
            }
            else
                $data['image']="";
                    DB::table('tbl_products')
                            ->where('product_id',$product_id)
                            ->update($data);
                    Session::put('message', 'Product Updated Successfully Without Image');
                    return Redirect::to('/all-product');
        }
    }
    public function update_stock_product(Request $request, $product_id){
        $data=array();
        $data['available_product']=$request->available_product;
            DB::table('tbl_products')
                    ->where('product_id',$product_id)
                    ->update($data);
        Session::put('active_message', 'Product Stock updated Successfully');
        return Redirect::to('/all-product');
    }

    //Authentication
    public function adminAuthCheck(){
    	$admin_id=Session::get('admin_id');
    	if ($admin_id) {
    		return Redirect::to('/dashboard');
    	}
    	else{
    		return Redirect::to('/admin')->send();
    	}
    }
}
