<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tax;
use Faker\Generator as Faker;

$factory->define(Tax::class, function (Faker $faker) {
    return [
        // 'total_rent'=>$faker->numberBetween(500000,900000),
        // 'total_service'=>$faker->numberBetween(50000,50000),
        // 'taxable_amount'=>$faker->numberBetween(50000,50000),
        // 'tax'=>$faker->numberBetween(50000,50000),
        // 'gross'=>$faker->numberBetween(50000,50000),

        // 'property_id'=>function(){return App\Property::all()->random();},

    ];
});
