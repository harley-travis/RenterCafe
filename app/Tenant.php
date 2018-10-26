<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model {

    protected $fillable = [
        'name', 
        'phone', 
        'email', 
        'renting',
        'balance', 
        'user_id',
        'property_id',
        'maintenance_id'
    ];


    // RELATIONSHIPS\
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function maintenance() {
        return $this->hasMany('App\Maintenance');
    }
}
