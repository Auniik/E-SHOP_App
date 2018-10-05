<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CustomerController extends Controller
{
	//CUSTOMER SIGN UP
    public function customer_registration(Request $request){
    	$data = array();
    	$data['customer_name']=$request->customer_name;
    	$data['customer_email']=$request->customer_email;
    	$data['customer_password']=md5($request->customer_password);
    	$data['customer_mobile']=$request->customer_mobile;
    	$customer_id=DB::table('tbl_customers')
    		->InsertGetId($data);
    	Session::put('customer_id',$customer_id);
    	Session::put('customer_name',$request->customer_name);
    	return redirect::to('/checkout');
    }

    //CUSTOMER LOGOUT
    public function customer_logout(){
        Session::flush();
        Cart::destroy();
        return redirect::to('/');
    }

    //CUSTOMER LOGIN
    public function customer_login(Request $request){
        $customer_email=$request->customer_email;
        $customer_password=md5($request->customer_password);
        $result=DB::table('tbl_customers')
                ->where('customer_email',$customer_email)
                ->where('customer_password',$customer_password)
                ->first();
        if($result){
            Session::put('customer_name', $result->customer_name);
            Session::put('customer_id', $result->customer_id);
            return Redirect::to('/');
        }
        else{
            Session::put('login_error', 'Email and Password is not valid.');
            return Redirect::to('/login-check');
        }
    }
}
