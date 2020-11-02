<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Application;
use Faker\Generator as Faker;

$factory->define(Application::class, function (Faker $faker) {
    return [

        'name'=>$faker->name,
        'phone'=>$faker->e164PhoneNumber,
        'email'=>$faker->unique()->safeEmail,
        'identity'=>$faker->numberBetween(100,200),
        'unit_id'=>function(){return App\Unit::all()->random();}

    ];
});
