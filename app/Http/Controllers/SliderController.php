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
    	$this->adminAuthCheck();
    	return view('admin.add_slider');
    }

    //SAVE SLIDER
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

    //ALL SLIDER
    public function all_slider(){
    	$this->adminAuthCheck();
    	$all_slider_info=DB::table('tbl_slider')->get();
    	return view('admin.all_slider')
    			->with('all_slider_info',$all_slider_info);
    }

    //PUBLICATION STATUS
    public function inactive_slider($slider_id){
    	DB::table('tbl_slider')
    			->where('slider_id',$slider_id)
    			->update(['publication_status'=>0]);
		Session::put('inactive_message', 'Slider Image is Inactived');
		return redirect::to('/all-slider');
    }

    public function active_slider($slider_id){
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->update(['publication_status'=>1]);
    	Session::put('active_message','Slider Image is Actived');
    	return redirect::to('/all-slider');
    }
    public function delete_slider($slider_id){
    	$this->adminAuthCheck();
    	DB::table('tbl_slider')
    		->where('slider_id',$slider_id)
    		->delete();
    	Session::put('inactive_message','Slider Image Deleted Successfully!');
    	return redirect::to('/all-slider');
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
