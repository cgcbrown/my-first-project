<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venue;
use App\Event;

class VenueController extends Controller
{
    public static function data() {
    	$today = date('Y-m-d');
		$venue_ids = Event::where('date', $today)->select('venue_id')->get();
		$venues = [];
		foreach($venue_ids as $venue_id) {
			$venues[] = Venue::where('id', $venue_id->venue_id)->first();
		}

    	return $venues;
    }

    public static function view($city) {

    
    	$cities = Venue::select('city')->groupBy('city')->get();

    	$venues = Venue::where('city', $city)->get();



    	return view('venues', compact('venues', 'cities', 'city'));
    }
}
