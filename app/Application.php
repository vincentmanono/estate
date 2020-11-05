<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Application extends Model
{
    use Notifiable ;
    protected $guarded = [];


    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

