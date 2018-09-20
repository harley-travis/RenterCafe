<?php

namespace App\Http\Controllers;

use Auth;
use App\Tenant;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;

class TenantController extends Controller {
    
    // get tenants
    public function getTenants() {
        if(Auth::check()) {
            $tenants = Tenant::where('user_id', '=', Auth::user()->id)->paginate(15);
            return view('tenants.overview', ['tenants' => $tenants]);
        } 
    }

    // direct them to the create form
    public function createTenant() {
        if(Auth::check()) {
            $properties = Property::where('user_id', '=', Auth::user()->id)->paginate(15);
            return view('tenants.create', ['properties' => $properties]);
        } 

    }

    // create tenant 
    public function addTenant(Request $request) {

        // VALIDATE

        // VALID USER
        $user = Auth::user(); 
        if(!$user) {
            return redirect()->back();
        }

        // COLLECT TENANT DATA
        $tenant = new Tenant([
            'name'          => $request->input('name'), 
            'phone'         => $request->input('phone'),
            'email'         => $request->input('email'),
            'balance'       => null,
            'user_id'       => Auth::user()->id, 
            'property_id'   => $request->input('property_id'), 
            // find property id
            // this should be a drop down. they should be able to pick from drop down which property. send the id here

        ]);

        $user->tenant()->save($tenant);

        // EMAIL TENANT TMP CRED.

        // 30 DAY EXPIRATION ON CRED


        return redirect()
            ->route('tenants.overview')
            ->with('info', 'Good news, the tenant was successfully added!');

    }

    // edit tenant
    public function editTenant() {
        
    }

    // reset tenant cred
    public function resetTenantCredentials() {

    }

    // remove tenant
    public function deleteTenant() {

    }

}
