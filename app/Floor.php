<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $guarded = [];

    public function unit(){
        return $this->belongsTo(Unit::class);
    }
    
}
