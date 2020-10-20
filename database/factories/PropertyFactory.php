<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Property;
use Faker\Generator as Faker;

$factory->define(Property::class, function (Faker $faker) {
    return [

        'name'=>$faker->name(),
        'type'=>$faker->randomElement(['residential','commercial','service_resident']),
        'date_of_cert_of_occupation'=>$faker->date(),
        'address'=>$faker->address,
        'image'=>$faker->imageUrl(),
        'year_of_construction'=>$faker->date(),
        'water_bill_rate'=>$faker->numberBetween(1,10),
        'l_r_no'=>$faker->numberBetween(1,10),
        'description'=>$faker->sentence($nbWords = 60, $variableNbWords = true),
        'branch_id'=>function(){return App\Branch::all()->random();},
        'user_id'=>function(){return App\User::all()->random();},

    ];
});
