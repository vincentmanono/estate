<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'to'=>function(){return App\User::all()->random();},
        'from'=>function(){return App\User::all()->random();},
        'message'=>$faker->realText(200,3)
    ];
});
