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

    public function getTenantId($id) {
        if(Auth::check()) {
            $tenant = Tenant::find($id);
            $properties = Property::where('user_id', '=', Auth::user()->id)->get();
            return view('tenants.edit', ['tenant' => $tenant, 'tenant_id' => $id, 'properties' => $properties]);
        } 
        //return view('tenants.edit', ['tenant' => $tenant, 'tenant_id' => $id]);
    }

    public function updateTenant(Store $session, Request $request) {

         // VALIDATE
         // CANNOT LET TEH USER SELECT A PROPERTRY ALREADY ASSIGNED TO A TENANT. THEY MUST UNDO THAT TENANT AND THEN THEY CAN ADD IT

         $tenant = Tenant::find($request->input('id'));
         $tenant->name = $request->input('name');
         $tenant->phone = $request->input('phone');
         $tenant->email = $request->input('email');
         $tenant->renting = $request->input('renting');
         $tenant->property_id = $request->input('property_id');

         $tenant->save();
 
         return redirect()->route('tenants.overview')->with('info', 'You successfully updated the tenant data.');

    }

    // reset tenant cred
    public function resetTenantCredentials() {

    }

    // remove tenant
    // TODO: NEED TO ARCHIVE THE TENANT AND NOT ACTUAL DELETE THEM
    public function deleteTenant($id) {
        $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect()->route('tenants.overview')->with('info', 'The tenant was successfully deleted');
    }

}
