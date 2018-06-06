<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class CategoryController extends Controller
{
    public function index(){
    	return view('admin.add_category');
    }


	//Saving Categories
    public function save_category(Request $request){
    	$data=array();
    	$data['category_id'] = $request->category_id;
    	$data['category_name'] = $request->category_name;
    	$data['category_description'] = $request->category_description;
    	$data['publication_status'] = $request->publication_status;
    	if ($data['publication_status']==null) {
    		$data['publication_status']=0;
    	}

    	DB::table('tbl_category')->insert($data);
    	Session::put('message', 'Category Added Successfully!');
    	return redirect::to('/add-category');
    }

    //All Categories
    public function all_category(){
    	$all_category_info=DB::table('tbl_category')->get();
    	return view('admin.all_category')
    			->with('all_category_info', $all_category_info);
    }

    //Publishing Category
    public function inactive_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_status'=>0]);
    	Session::put('inactive_message', 'Category Unublished Successfully!');
    	return redirect::to('/all-category');
    }
    public function active_category($category_id){
    	DB::table('tbl_category')
    		->where('category_id', $category_id)
    		->update(['publication_status'=>1]);
    	Session::put('active_message', 'Category Published Successfully!');
    	return redirect::to('/all-category');
    }


    //Category Edit
    public function edit_category($category_id){
    	$category_info = DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->first();
    	return view('admin.edit_category')
    		->with('category_info', $category_info);
    }
    
    //category Update
    public function update_category(Request $request, $category_id){
    	$data=array();
    	$data['category_id']=$request->category_id;
    	$data['category_name']=$request->category_name;
    	$data['category_description']=$request->category_description;
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->update($data);
    	Session::put('active_message', $request->category_name.' Category Updated Successfully!!');
    	return redirect::to('/all-category');

    }

    //Delete Category
    public function delete_category($category_id)
    {
    	DB::table('tbl_category')
    		->where('category_id',$category_id)
    		->delete();
    	Session::put('inactive_message', 'Category Deleted Successfully!!');
    	return redirect::to('/all-category');
    }
}
