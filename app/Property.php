<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {

    protected $casts = [
        'id' => 'integer'
    ];
    
    protected $fillable = [
        'address_1', 
        'address_2', 
        'city', 
        'state', 
        'zip', 
        'country', 
        'occupied',
        'lease_length',
        'rent_amount',
        'pet',
        'tenant_id',
        'maintenance_id',
        'repair_id'
    ];

    // RELATIONSHIPS
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tenant() {
        return $this->belongsTo('App\Tenant');
    }

    public function maintenance() {
        return $this->hasMany('App\Maintenance');
    }

    public function repairs() {
        return $this->hasMany('App\Repair');
    }

}
