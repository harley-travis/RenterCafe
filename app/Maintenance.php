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
        'status',
        'property_id',
        'repair_id'
    ];

    // RELATIONSHIPS
    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function repair() {
        return $this->belongsTo('App\Repair');
    }
}
