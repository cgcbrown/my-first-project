<?php

namespace App\Http\Controllers;
use Auth;
use App\Venue;
use App\User;
use App\Admin;
use App\Deed;
use Illuminate\Http\Request;

class AdminController extends Controller {


    public static function adminVenuesView() {
    	$user = Auth::id();
    	$admin = Admin::where('user_id', $user)->first();

    	$venues = $admin->venues;
  
        return view('admin_venues', compact('venues'));         
    }


}
