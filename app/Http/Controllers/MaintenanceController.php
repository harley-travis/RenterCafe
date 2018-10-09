<?php

namespace App\Http\Controllers;

use Auth;
use App\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller {

    public function getRequests() {
        // NEED TO FIGURE OUT HOW THIS RELATIONSHIP TABLE WILL WORK
        // BASE ON TENANT? USER? PROPERTY?
        // HOW TO TIE IT TO THE LANDLORDS ACCOUNT??
        if(Auth::check()) {
            $requests = Maintenance::where('user_id', '=', Auth::user()->id)->paginate(15);
            return view('maintenance.overview', ['requests' => $requests]);
        } 
    }

    public function createRequest() {

        // tenant add the request

        // subject line

        // message

        // attachment

        // save

    }

    public function addRequest() {

    }

    public function getRequestId() {
        // find the request id and send it back 
    }

    public function updateRequest() {
        // mark status (done by user)
        // pending
        // in progress
        // completed
    }

    // archive request (don't delete. we will want it for the reports)
    public function archiveRequest() {
        
    }

}
