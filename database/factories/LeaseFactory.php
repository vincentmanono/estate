<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lease;
use Faker\Generator as Faker;

$factory->define(Lease::class, function (Faker $faker) {
    return [

        'status'=> $faker->boolean() ,
        'date'=>$faker->date(),
        'user_id'=>function(){return App\User::all()->random();},
        'unit_id'=>function(){return App\Unit::all()->random();},
        'file'=>$faker->url()

    ];
});
