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
        'user_id',
        'repair_id',
        'tenant_id'
    ];

    // RELATIONSHIPS
    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function tenant() {
        return $this->belongsTo('App\Tenant');
    }

    public function repair() {
        return $this->belongsTo('App\Repair');
    }
}
