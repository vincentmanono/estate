<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sms;
use Faker\Generator as Faker;

$factory->define(Sms::class, function (Faker $faker) {
    return [
        'to'=>function(){return App\User::all()->random();},
        'from'=>function(){return App\User::all()->random();},
        'unit_id'=>function(){return App\User::all()->random();},
        'message'=>$faker->realText(200,3)
    ];
});
