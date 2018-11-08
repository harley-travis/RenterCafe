<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTenant extends Model {
    protected $fillable = [
        'user_id', 
        'tenant_id', 
    ];

    // RELATIONSHIPS
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function tenant() {
        return $this->hasMany('App\Tenant');
    }
}
