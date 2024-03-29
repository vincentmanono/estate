<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TenantService;
use Faker\Generator as Faker;

$factory->define(TenantService::class, function (Faker $faker) {
    return [

        'unit_id'=>function() { return App\Unit::all()->random();},
        'user_id'=>function() { return App\User::all()->random();},
        'status'=>$faker->numberBetween(0,2),
        'message'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});
