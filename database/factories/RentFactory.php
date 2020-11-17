<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use App\Unit;
use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    $unitId = function(){return App\Unit::all()->random();} ;

    return [

            'amount'=>$faker->numberBetween(5000,10000),
            'paid_date'=>$faker->dateTimeBetween('-60 days','0 days') ,
            'expiry_date'=>$faker->dateTimeBetween('-60 days','0 days') ,
            'description'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'user_id'=>function(){return App\User::all()->random();},
            'unit_id'=>$unitId ,
        ];
    });
