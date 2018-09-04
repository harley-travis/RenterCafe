<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model {
    
    protected $fillable = [
        'address_1', 
        'address_2', 
        'city', 
        'state', 
        'zip', 
        'country', 
        'occupied',
        'lease_length',
        'rent_amount'
    ];

    // RELATIONSHIPS

}
