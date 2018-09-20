<?php

namespace App\Http\Controllers;

use Auth;
use App\Tenant;
use Illuminate\Http\Request;

class TenantController extends Controller {
    
    // get tenants
    public function getTenants() {
        if(Auth::check()) {
            $tenants = Tenant::where('user_id', '=', Auth::user()->id)->paginate(15);
            return view('tenants.overview', ['tenants' => $tenants]);
        } 
    }


    // create tenant 
    public function createTenant(Request $request) {

        // VALIDATE

        // VALID USER
        $user = Auth::user(); 
        if(!$user) {
            return redirect()->back();
        }

        // COLLECT TENANT DATA
        $tenant = new Tenant([
            'name'          => $request->input('address_1'), 
            'phone'         => $request->input('address_2'),
            'email'         => $request->input('city'),
            'balance'       => $request->input('state'),
            'property_id'   => $request->input('property_id'), 
            // find property id
            // this should be a drop down. they should be able to pick from drop down which property. send the id here

        ]);

        $tenant()->save();

        // EMAIL TENANT TMP CRED.

        // 30 DAY EXPIRATION ON CRED


        return redirect()
            ->route('tenant.overview')
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
