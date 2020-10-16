<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [

            'name'=>$faker->name(),
            'address'=>$faker->address,
            'email'=>$faker->unique()->safeEmail,
            'amount'=>$faker->numberBetween(5000,10000),
            'checkin_date'=>$faker->date(),
            'checkout_date'=>$faker->date(),
            'unit_id'=>function(){return App\Unit::all()->random();}
    ];
});
