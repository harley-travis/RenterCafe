<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class SettingsController extends Controller {
     
    // get data for page
     public function index() {
        $user = Auth::user();
        return view('settings.overview', ['user' => $user]);
    }

    // add billing options

    // upload user image
    
    // change password
}
