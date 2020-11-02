<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Branch extends Model
{
    protected $guarded=[];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
