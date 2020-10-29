<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $guarded=[];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
