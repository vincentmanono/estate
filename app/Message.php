<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function messageFrom()
    {
        return $this->belongsTo('App\User', 'from', 'id');
    }

    public function messageTo()
    {
        return $this->belongsTo('App\User', 'to', 'id');
    }

}
