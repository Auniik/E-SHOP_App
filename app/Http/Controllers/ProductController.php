<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
    	return view('admin.add_product');
    }

    //Save Product
    public function save_product(){
    	
    }
}
