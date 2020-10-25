<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Deposit;
use Faker\Generator as Faker;

$factory->define(Deposit::class, function (Faker $faker) {
    return [

        'amount'=>$faker->numberBetween(5000,20000),
        'unit_id'=>function(){return App\Unit::all()->random();},
        'status'=>$faker->boolean(),
        'date'=>$faker->date(),
        'user_id'=>function(){return App\User::all()->random();}

    ];
});
