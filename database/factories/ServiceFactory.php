<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'phone'=>$faker->e164PhoneNumber,
        'email'=>$faker->unique()->safeEmail,
        'type'=>$faker->randomElement(['internet','water','power']),

    ];
});
