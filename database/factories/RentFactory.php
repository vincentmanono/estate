<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    return [

            'amount'=>$faker->numberBetween(5000,10000),
            'no_months'=>$faker->numberBetween(1,12),
            'date'=>$faker->date(),
            'description'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'user_id'=>function(){return App\User::all()->random();},
            'unit_id'=>function(){return App\Unit::all()->random();}

    ];
});
