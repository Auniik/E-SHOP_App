<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
use Redirect;
class SliderController extends Controller
{
    public function index(){
    	return view('admin.add_slider');
    }
    public function save_slider(Request $request){
    	$data=array();
    	$data['publication_status']=$request->publication_status;
    	if ($data['publication_status']==null) $data['publication_status']=0;
    	$image=$request->file('slider_image');
    	if ($image) {
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='slider/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if ($success) {
    			$data['slider_image']=$image_url;

       				DB::table('tbl_slider')->insert($data);
    				Session::put('message', 'Slider Image Added Successfully');
    				return Redirect::to('/add-slider');
    		}
    		else
    			$data['image']="";
    				DB::table('tbl_slider')->insert($data);
    				Session::put('message', 'Product Added Successfully Without Image');
    				return Redirect::to('/add-slider');
    	}
    	return redirect::to('/add-slider');
    }
}
