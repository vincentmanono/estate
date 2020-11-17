<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Water;
use Faker\Generator as Faker;

$factory->define(Water::class, function (Faker $faker) {
    return [

            'amount'=>$faker->numberBetween(5000,10000),
            'pay_date'=>$faker->date(),
            'read_date'=>$faker->date(),
            'paid'=>$faker->boolean(),
            'previous_reading'=>$faker->randomNumber(7,true),
            'new_reading'=>$faker->randomNumber(8,true),
            'unit_id'=>function(){return App\Unit::all()->random();}
    ];
});
