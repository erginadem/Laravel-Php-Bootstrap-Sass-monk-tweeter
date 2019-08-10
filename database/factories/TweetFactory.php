<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Tweet;
use Faker\Generator as Faker;

$factory->define(Tweet::class, function (Faker $faker) {
    return [
        'body'  =>  $faker->realText($faker->numberBetween(30, 240)),
    ];
});
