<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();
class CheckoutController extends Controller
{

    public function login_check(){
        $customer_id=Session::get('customer_id');
        if ($customer_id!=null) {
            return redirect::to('/');
        }
        else{
            return view('pages.login');
        }
    	
    }

    
    public function checkout(){
        $customer_id=Session::get('customer_id');
        if ($customer_id!=null) {
            return view('pages.checkout');
        }
        else{
            return view('pages.errorurl');
        }
    	
    }

    public function save_shipping(Request $request){
        $data=array();
        $data['shipping_first_name']=$request->shipping_first_name;
        $data['shipping_last_name']=$request->shipping_last_name;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_mobile_number']=$request->shipping_mobile_number;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_city']=$request->shipping_city;
        $data['shipping_address']=$request->shipping_address;
        $data['shipping_zip']=$request->shipping_zip;
        $shipping_id=DB::table('tbl_shipping')
                        ->InsertGetId($data);
        Session::put('shipping_id',$shipping_id);
        return Redirect::to('/payment');
    }

    public function payment(){
        $customer_id=Session::get('customer_id');
        $shipping_id=Session::get('shipping_id');
        if ($customer_id!=null) {
            if (Cart::instance('default')->count()==0 || $shipping_id==null) {
                Session::put('check_payment', 'Add some product to cart to pay!');
                return Redirect::to('/');
            }
            else{
                return view('pages.payment');                
            }
        }
        else{
            return view('pages.errorurl');
        }
        
    }

    public function order_place(Request $request){
        $payment_gateway=$request->payment_gateway;
        echo $payment_gateway;
    }
    

}
