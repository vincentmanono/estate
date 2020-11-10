<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'address',  'phone', 'kra_pin',  'id_no', 'type' .
            'email', 'image'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function leases()
    {
        return $this->hasMany(Lease::class);
    }
    public function smss()
    {
        return $this->hasMany(Sms::class);
    }
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }

    public function isManager()
    {

        if ($this->type == "manager") {
            return true;
        } else {
            return false;
        }
    }
    public function isOwner()
    {

        if ($this->type == "owner") {
            return true;
        } else {
            return false;
        }
    }
    public function isTenant()
    {

        if ($this->type == "tenant") {
            return true;
        } else {
            return false;
        }
    }

    public function requests()
    {
        return $this->hasMany(TenantService::class);
    }
}
