<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Floor;
use Faker\Generator as Faker;

$factory->define(Floor::class, function (Faker $faker) {
    return [

            'image'=>$faker->url(),
            'kitchen'=>$faker->word(),
            'sitting'=>$faker->word(),
            'bedroom'=>$faker->word(),
            'swimming'=>$faker->word(),
            'garden'=>$faker->word(),
            'unit_id'=>function(){return App\Unit::all()->random();}
    ];
});
