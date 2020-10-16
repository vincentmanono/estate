<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded=[];

    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function guests(){
        return $this->hasMany(Guest::class);
    }
    public function deposits(){
        return $this->hasMany(Deposit::class);
    }
    public function rents(){
        return $this->hasMany(Rent::class);
    }
    public function maintenances(){
        return $this->hasMany(Maintenance::class);
    }
    public function leases(){
        return $this->hasMany(Lease::class);
    }
    public function floor(){
        return $this->hasOne(Floor::class);
    }
    public function smss(){
        return $this->hasMany(Sms::class);
    }
    public function waters(){
        return $this->hasMany(Water::class);
    }
}
