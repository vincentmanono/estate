<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $guarded=[];

    public function property(){
        return $this->belongsTo(Property::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
