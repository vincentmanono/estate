<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Water;
use Faker\Generator as Faker;

$factory->define(Water::class, function (Faker $faker) {
    return [

            'amount'=>$faker->numberBetween(5000,10000),
            'pay_date'=>$faker->date(),
            'no_months'=>$faker->numberBetween(1,12),
            'read_date'=>$faker->date(),
            'new_reading'=>$faker->randomNumber($nmDigits=4,$strict=false),
            'unit_id'=>function(){return App\Unit::all()->random();}
    ];
});
