<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'name'=>$faker->name(),
        'phone'=>$faker->phoneNumber,
        'email'=>$faker->email,
        'description'=>$faker->realText(150,2)
    ];
});
