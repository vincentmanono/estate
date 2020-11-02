<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];


    public function property()
    {
        return $this->belongsTo(Unit::class);
    }
}

