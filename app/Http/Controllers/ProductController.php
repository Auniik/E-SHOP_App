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
    	$all_product_info = DB::table('tbl_products')->get();
    	return view('admin.all_product')
    		->with('all_product_info', $all_product_info);
    }

    //Delete Products

    public function delete_product($product_id){
    	DB::table('tbl_products')
    		->where('product_id',$product_id)
    		->delete();
    	Session::put('message','Product Deleted Successfully!!');
    	return Redirect::to('/all-product');
    }
}
