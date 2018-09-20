<?php

namespace App\Http\Controllers;

use Auth;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;

class PropertyController extends Controller {
    
    public function getProperties() {

        if(Auth::check()) {
            $properties = Property::where('user_id', '=', Auth::user()->id)->paginate(15);
            dd($properties);
            return view('property.overview', ['properties' => $properties]);
        } 

    }

    public function createProperty() {
        return view('property.create');
    }

    public function addProperty(Request $request) {

        // VALIDATE

        // VALID USER
        $user = Auth::user(); 
        if(!$user) {
            return redirect()->back();
        }

        $property = new Property([
            'address_1'     => $request->input('address_1'), 
            'address_2'     => $request->input('address_2'),
            'city'          => $request->input('city'),
            'state'         => $request->input('state'),
            'zip'           => $request->input('zip'),
            'country'       => $request->input('country'),
            'occupied'      => $request->input('occupied'),
            'lease_length'  => $request->input('lease_length'),
            'rent_amount'   => $request->input('rent_amount'),
            'pet'           => $request->input('pet'),
            'tenant_id'     => '0',
            'maintenance_id'=> '0',
            'repair_id'     => '0',
            'user_id'       => Auth::user()->id, 
            
        ]);

        $user->property()->save($property);

        return redirect()
            ->route('property.overview')
            ->with('info', 'Good news, your job was added!');

    }

    public function getPropertyId($id) {

        $property = Property::find($id);
        return view('property.edit', ['property' => $property, 'property_id' => $id]);
    }

    public function updateProperty(Store $session, Request $request) {

        // VALIDATE

        $property = Property::find($request->input('id'));
        $property->address_1 = $request->input('address_1');
        $property->address_2 = $request->input('address_2');
        $property->city = $request->input('city');
        $property->state = $request->input('state');
        $property->zip = $request->input('zip');
        $property->country = $request->input('country');
        $property->occupied = $request->input('occupied');
        $property->lease_length = $request->input('lease_length');
        $property->rent_amount = $request->input('rent_amount');
        $property->pet = $request->input('pet');

        $property->save();

        return redirect()->route('property.overview')->with('info', 'Your property was successfully updated');

    }

    public function deleteProperty($id) {
        $property = Property::find($id);
        $property->delete();
        return redirect()->route('property.overview')->with('info', 'Your property was successfully deleted');
    }


}