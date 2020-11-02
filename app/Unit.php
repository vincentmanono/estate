<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    protected $guarded=[];

    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function leased()
    {
        return $this->hasOne(Lease::class);
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

    public function floor(){
        return $this->hasOne(Floor::class);
    }

    public function waters(){
        return $this->hasMany(Water::class);
    }
    public function applications(){
        return $this->hasMany(Application::class);
    }
}
