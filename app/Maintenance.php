<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model {
    
    protected $fillable = [
        'subject', 
        'type', 
        'description', 
        'emergency', 
        'permission', 
        'property_id'
    ];

    // RELATIONSHIPS
    public function property() {
        return $this->belongsTo('App\Property');
    }
}
