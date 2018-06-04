<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();

class SuperAdminController extends Controller
{
    public function logout(){
    	Session::flush();
    	return redirect::to('/admin');
    }
}
