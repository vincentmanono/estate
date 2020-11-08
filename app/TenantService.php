<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenantService extends Model
{

    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }


}
