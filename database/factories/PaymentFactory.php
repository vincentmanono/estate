<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'type'=>$faker->name,
        'number'=>$faker->randomNumber(6,true),
    ];
});
