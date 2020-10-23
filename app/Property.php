<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded=[];
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function units(){
        return $this->hasMany(Unit::class);
    }
    public function expenses(){
        return $this->hasMany(Expense::class);
    }
}
