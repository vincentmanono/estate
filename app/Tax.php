<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $guarded =[];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    protected $casts = [
        'created_at' => 'date'

    ];

}
