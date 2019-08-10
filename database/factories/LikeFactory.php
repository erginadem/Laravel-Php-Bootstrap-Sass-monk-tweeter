<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Like;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'tweet_id'  =>  $faker->unique()->numberBetween(1, 25 * $GLOBALS['userCount'])
    ];
});
