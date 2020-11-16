<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TenantService;
use Faker\Generator as Faker;

$factory->define(TenantService::class, function (Faker $faker) {
    return [

        'unit_id'=>function() { return App\Unit::all()->random();},
        'user_id'=>function() { return App\User::all()->random();},
        'message'=>$faker->realText(200,3),
        'status'=>$faker->boolean()
    ];
});
