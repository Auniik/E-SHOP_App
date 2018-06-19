<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
	public function index(){
		$this->adminAuthCheck();
		return view('admin.dashboard');
	}
    public function adminAuthCheck(){
    	$admin_id=Session::get('admin_id');
    	if ($admin_id) {
    		return redirect::to('/dashboard');
    	}
    	else{
    		return redirect::to('/admin')->send();
    	}
    }

    public function logout(){
    	Session::flush();
    	return redirect::to('/admin');
    }
}
