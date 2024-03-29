<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    $rent = $faker->numberBetween(10000,50000) ;
    return [

            'name'=>$faker->word(),
            'rent'=>$rent,
            // 'rent_escalation'=>$faker->numberBetween(200,1000),
            'water_meter'=>$faker->numberBetween(16,20),
            // 'rent_escalation'=>$faker->numberBetween(200,1000),
            // 'billing_cycle'=>$faker->randomElement(['monthly','quartely','annually','bi-annually']),//monthy,quartely,bi-annually,annually
            'water_acc_no'=>$faker->numberBetween(200,1000),
            'electricity_meter'=>$faker->randomElement(['prepaid','postpay']),//prepaid and post-paid
            'electricity_acc_no'=>$faker->numberBetween(200,1000),
            'service_charge'=>$rent * 0.01,
            'status'=>$faker->boolean(),
            'property_id'=>function(){return App\Property::all()->random();},

        ];
});
