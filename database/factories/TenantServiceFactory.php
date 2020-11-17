<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TenantService;
use Faker\Generator as Faker;

$factory->define(TenantService::class, function (Faker $faker) {
    return [

        'unit_id'=>function() { return App\Unit::all()->random();},
        'user_id'=>function() { return App\User::all()->random();},
<<<<<<< HEAD
        'status'=>$faker->boolean(),
        'property_id'=>function() { return App\Property::all()->random();},
        'message'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
=======
        'message'=>$faker->realText(200,3),
        'status'=>$faker->boolean()
>>>>>>> 8789f6873bd0d77d62588e6f137a2cbb0d9db513
    ];
});
