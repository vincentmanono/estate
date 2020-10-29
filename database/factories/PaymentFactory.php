<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [


        'name'=>$faker->word(),
        'number'=>$faker->numberBetween(3,10),
        'status'=>$faker->randomElement(['Active','Inactive'])


    ];
});
