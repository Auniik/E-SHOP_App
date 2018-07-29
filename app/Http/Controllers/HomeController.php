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

    	return view('pages.home_content')
    		->with('published_product', $published_product);
    }
}
