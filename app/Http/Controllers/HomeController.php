<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class HomeController extends Controller
{
    public function index(){
    	$published_product = DB::table('tbl_products')
                                    ->join('tbl_category', 'tbl_products.category_id','=','tbl_category.category_id')
                                    ->join('tbl_manufacture', 'tbl_products.manufacture_id', '=','tbl_manufacture.manufacture_id')
                                    ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
                                    ->where('tbl_products.publication_status',1)
                                    ->limit(9)
                                    ->get();

           $manage_home = view('pages.home_content')
           				->with('published_product',$published_product);
           	return view('layout')
           				->with('pages.home_content',$manage_home);
    	// return view('pages.home_content')
    	// 	->with('published_product', $published_product);
    }

    public function categorised_products($category_id){
    	$products_by_category=DB::table('tbl_products')
    			->join('tbl_category', 'tbl_products.category_id','=', 'tbl_category.category_id')
    			->select('tbl_products.*', 'tbl_category.category_name')
    			->where('tbl_category.category_id',$category_id)
    			->where('tbl_products.publication_status',1)
    			->limit(18)
    			->get();
    		return view('pages.products_by_category')
    				->with('products_by_category', $products_by_category);
    }

    public function manufactured_products($manufacture_id){
    	$products_by_manufacture=DB::table('tbl_products')
    			->join('tbl_manufacture', 'tbl_products.manufacture_id','=','tbl_manufacture.manufacture_id')
    			->select('tbl_products.*', 'tbl_manufacture.manufacture_name')
    			->where('tbl_manufacture.manufacture_id', $manufacture_id)
    			->where('tbl_products.publication_status',1)
    			->limit(18)
    			->get();
    	return view('pages.products_by_manufacture')
    			->with('products_by_manufacture', $products_by_manufacture);
    }
}
