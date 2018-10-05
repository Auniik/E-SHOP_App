<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Redirect;

class CartController extends Controller
{
    public function add_to_cart(Request $request){
    	$qty=$request->qty;
    	$product_id=$request->product_id;
    	$product_info=DB::table('tbl_products')
    				->where('product_id',$product_id)
    				->first();
    	$data['qty']=$qty;
       	$data['id']=$product_info->product_id;
    	$data['name']=$product_info->product_name;
    	$data['price']=$product_info->product_price;
    	$data['options']['image']=$product_info->product_image;
    	Cart::add($data);
    	return Redirect::to('/show-cart');
    }
    public function show_cart(){
    	$all_published_category=DB::table('tbl_category')
    						->where('publication_status',1)
    						->get();
    	return view('pages.show_cart')
    			->with('all_published_category',$all_published_category);
    }

    public function delete_to_cart(Request $request){
    	$rowId=$request->rowId;
    	Cart::remove($rowId);
    	return Redirect::to('/show-cart');
    }

    public function update_cart(Request $request)
    {
    	$qty=$request->qty;
    	$rowId=$request->rowId;
    	Cart::update($rowId, $qty);
    	return Redirect::to('/show-cart');
    }

    public function add_to_wishlist(Request $request){
        $product_id=$request->product_id;
        $product_info=DB::table('tbl_products')
                    ->where('product_id',$product_id)
                    ->first();
        $data['qty']=1;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price;
        $data['options']['image']=$product_info->product_image;
        Cart::instance('wishlist')->add($data);
        return Redirect::to('/');
        
    }

    public function show_wishlist(){
        $all_published_category=DB::table('tbl_category')
                            ->where('publication_status',1)
                            ->get();
        return view('pages.wishlist')
                ->with('all_published_category',$all_published_category);
    }

    public function delete_to_wishlist(Request $request){
        $rowId=$request->rowId;
        Cart::instance('wishlist')->remove($rowId);
        return Redirect::to('/show-wishlist');
    }

    

}
