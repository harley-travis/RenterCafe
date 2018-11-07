<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'isAdmin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // RELATIONSHIPS
    public function property() {
        return $this->hasMany('App\Property');
    }

    public function tenant() {
        return $this->hasMany('App\Tenant');
    }

    public function stripe() {
        return $this->hasMany('\Rap2hpoutre\LaravelStripeConnect\Stripe');
    }
}
