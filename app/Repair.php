<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repair extends Model {
    
    protected $fillable = [
        'title', 
        'type',
        'description', 
        'spent', 
        'notes', 
        'status', 
        'property_id'
    ];

    // RELATIONSHIPS
    public function property() {
        return $this->belongsTo('App\Property');
    }

    public function maintenance() {
        return $this->belongsTo('App\Maintenance');
    }

}
