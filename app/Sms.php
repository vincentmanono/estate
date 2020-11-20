<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms extends Model
{
    protected $guarded =[];

    public function sendTo(){
        return $this->belongsTo(User::class,'to');
    }
    public function sendFrom(){
        return $this->belongsTo(User::class,'from');
    }
    public function unit(){
        return $this->belongsTo(Unit::class);
    }
}
