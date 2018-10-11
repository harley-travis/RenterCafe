<?php

namespace App\Http\Controllers;

use Auth;
use App\Maintenance;
use App\Property;
use App\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;

class MaintenanceController extends Controller {

    public function getRequests() {
        if(Auth::check()) {
            $requests = Maintenance::where('user_id', '=', Auth::user()->id)->whereNotIn('status',['2'])->with('property')->paginate(15);
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

    public function getRequestId($id) {
        if(Auth::check()) {
            $request = Maintenance::with('tenant')->find($id);
            $properties = Property::where('maintenance_id', '=', $id)->get();
            return view('maintenance.view', ['request' => $request, 'properties' => $properties]);
        } 
    }

    public function updateRequest(Store $session, Request $request) {
        $maintenance = Maintenance::find($request->input('id'));
        $maintenance->status = $request->input('status');
        $maintenance->save();

        // send an email to the tenant with the update report

        return redirect()->route('maintenance.overview')->with('info', 'You successfully updated the maintenance reqeust.');
    }

    public function viewArchivedRequests() {
        if(Auth::check()) {
            $requests = Maintenance::where('user_id', '=', Auth::user()->id)->where('status',['2'])->with('property')->paginate(15);
            return view('maintenance.archive', ['requests' => $requests]);
        } 
    }

}
