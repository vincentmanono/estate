<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expense;
use Faker\Generator as Faker;

$factory->define(Expense::class, function (Faker $faker) {
    return [

            'occurance'=>$faker->randomElement (['regular','once']),
            'type'=>$faker->randomElement (['rent','waterbill','electricitybill','repair']),
            'date'=>$faker->date(),
            'amount'=>$faker->numberBetween(200,1000),
            'description'=>$faker->paragraph($nbSentences = 3, $variableNbSentences = true),
            'property_id'=>function(){return App\Property::all()->random();},
            'user_id'=>function(){return App\User::all()->random();}

    ];
});
