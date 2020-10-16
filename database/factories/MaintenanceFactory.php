<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Maintenance;
use Faker\Generator as Faker;

$factory->define(Maintenance::class, function (Faker $faker) {
    return [


            'subject'=>$faker->paragraph($nbSentences = 2, $variableNbSentences = true),
            'body'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'cost'=>$faker->numberBetween(200,1000),
            'user_id'=>function(){return App\User::all()->random();},
            'unit_id'=>function(){return App\Unit::all()->random();}

    ];
});
