<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'location'  =>  $faker->city,
        'birthday'  =>  $faker->dateTime($max = 'now'),
        'bio'       =>  $faker->realText($faker->numberBetween(80, 200))
    ];
});
