<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    protected $guarded =[];
    public function property(){
        return $this->belongsTo(Property::class);
    }

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
