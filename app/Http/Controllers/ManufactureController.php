<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
session_start();

class ManufactureController extends Controller
{
    public function index(){
        $this->adminAuthCheck();
    	return view('admin.add_manufacture');
    }

    //Save Brands
    public function save_manufacture(Request $request){
    	$data=array();
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	$data['publication_status']=$request->publication_status;
    	if ($data['publication_status']==null) {
    		$data['publication_status']=0;
    	}
    	DB::table('tbl_manufacture')->insert($data);
    	Session::put('message', 'Manufacture Added Successfully!');
    	return redirect::to('/add-manufacture');
    }

    //Show Brands
    public function all_manufacture(){
        $this->adminAuthCheck();
    	$all_manufacture_info=DB::table('tbl_manufacture')->get();
    	return view('admin.all_manufacture')
    			->with('all_manufacture_info',$all_manufacture_info);
    }


    //Publishing Status
    public function inactive_manufacture($manufacture_id){
        $this->adminAuthCheck();
    	DB::table('tbl_manufacture')
    			->where('manufacture_id', $manufacture_id)
    			->update(['publication_status'=>0]);
    	Session::put('inactive_message', 'Manufacture is inactived');
    	return redirect::to('/all-manufacture');
    }
    public function active_manufacture($manufacture_id){
        $this->adminAuthCheck();
    	DB::table('tbl_manufacture')
    			->where('manufacture_id', $manufacture_id)
    			->update(['publication_status'=>1]);
    	Session::put('active_message', 'Manufacture is actived');
    	return redirect::to('/all-manufacture');
    }

    //Edit Manufacture
    public function edit_manufacture($manufacture_id){
        $this->adminAuthCheck();
    	$manufacture_info=DB::table('tbl_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->first();
    	return view('admin.edit_manufacture')
    		->with('manufacture_info', $manufacture_info);
    }
    //update Manufacture
    public function update_manufacture(Request $request, $manufacture_id){
    	$data=array();
    	$data['manufacture_id']=$request->manufacture_id;
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_description']=$request->manufacture_description;
    	DB::table('tbl_manufacture')
    		->where('manufacture_id', $manufacture_id)
    		->update($data);
    	Session::put('active_message', 'Manufacture Updated Successfully!!');
    	return redirect::to('/all-manufacture');
    }
    //Delete Manufacture
    public function delete_manufacture($manufacture_id){
        $this->adminAuthCheck();
    	DB::table('tbl_manufacture')
    		->where('manufacture_id',$manufacture_id)
    		->delete();
    	Session::put('inactive_message', 'Manufacture Deleted Successfully!');
    	return redirect::to('/all-manufacture');
    }

    //Authentication
    public function adminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return redirect::to('/dashboard');
        }
        else{
            return redirect::to('/admin')->send();
        }
    }
}
