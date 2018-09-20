<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model {

    protected $fillable = [
        'name', 
        'phone', 
        'email', 
        'balance', 
        'property_id'
    ];


    // RELATIONSHIPS
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function property() {
        return $this->belongsTo('App\Property');
    }
}
