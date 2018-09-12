<?php

namespace App\Http\Controllers;

use App\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller {

    // send maint req (does this just happen in the main cont?)
    public function addMaintenanceRequest() {

    }
    
    // mark status (done by user)
        // pending
        // in progress
        // completed
    public function status() {

    }

    // archive request (don't delete. we will want it for the reports)
    public function archive() {
        
    }



}
