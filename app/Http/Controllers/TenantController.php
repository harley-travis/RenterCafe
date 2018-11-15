<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Auth\RegisterController;
use App\Tenant;
use App\Property;
use App\Http\Controllers\PropertyController;
use App\UserTenant;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use \Rap2hpoutre\LaravelStripeConnect\StripeConnect;

class TenantController extends Controller {
    
    // get tenants
    public function getTenants() {
        if(Auth::check()) {
            $tenants = Tenant::join('user_tenants', 'tenants.id', '=', 'user_tenants.tenant_id')
                            ->where('user_tenants.user_id', '=', Auth::user()->id)
                            ->paginate(15);

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

        // VALID USER
        $user = Auth::user(); 
        if(!$user) {
            return redirect()->back();
        }

        // VALIDATE DATA

        // create user account for tenant
        $registeredUser = RegisterController::createTenant($request->input('name'), $request->input('email'));

        // COLLECT TENANT DATA
        $tenant = new Tenant([
            'name'          => $request->input('name'), 
            'phone'         => $request->input('phone'),
            'email'         => $request->input('email'),
            'balance'       => null,
            'user_id'       => $registeredUser['id'], 
            'property_id'   => $request->input('property_id'), 
            'maintenance_id'=> '0', 
        ]);

        $tenant->save();

        // create stripe customer acct for tenant
        StripeConnect::createCustomer($request->input('token'), $tenant, $params = []);

        // add the user to the user_tenant table
        self::addUserTenant($tenant['id']);

        // add the user to the property table
        PropertyController::addTenantToProperty($request->input('property_id'), $tenant['id']);

        // EMAIL TENANT TMP CRED.
        // $this::sendTenantEmail($tenant);

        return redirect()
            ->route('tenants.overview')
            ->with('info', 'Good news, the tenant was successfully added!');

    }

    // add the tenant to the user_tenant table
    public function addUserTenant($id) {
        
        $userTenant = new UserTenant([
            'user_id' => Auth::user()->id,
            'tenant_id' => $id,
        ]);

        $userTenant->save();
    }

    // send tenant login cred
    public function sendTenantEmail($tenant) {
       
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
    // TO DO: NEED TO ARCHIVE THE TENANT AND NOT ACTUAL DELETE THEM
    public function deleteTenant($id) {
        $tenant = Tenant::find($id);
        $tenant->delete();
        return redirect()->route('tenants.overview')->with('info', 'The tenant was successfully deleted');
    }

}
