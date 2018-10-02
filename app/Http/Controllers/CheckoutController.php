<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();
class CheckoutController extends Controller
{
    public function login_check(){
    	return view('pages.login');
    }

    public function customer_registration(Request $request){
    	$data = array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['password']=md5($request->password);
    	$data['customer_mobile']=$request->customer_mobile;
    	$customer_id=DB::table('tbl_customers')
    		->InsertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return redirect::to('/checkout');
    }
    public function checkout(){
    	return view('pages.checkout');
    }

}
