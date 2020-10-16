<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Branch;
use Faker\Generator as Faker;

$factory->define(Branch::class, function (Faker $faker) {
    return [
        'name'=>$faker->name(),
        'status'=>$faker->randomElement (['Active','Inactive']),

    ];
});
