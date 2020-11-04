<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Floor;
use Faker\Generator as Faker;

$factory->define(Floor::class, function (Faker $faker) {
    return [

            'image'=>$faker->url(),
            'kitchen'=>$faker->numberBetween(1,4),
            'sitting'=>$faker->numberBetween(1,4),
            'bedroom'=>$faker->numberBetween(1,4),
            'garage'=>$faker->numberBetween(1,4),
            'unit_id'=>function(){return App\Unit::all()->random();}
    ];
});
