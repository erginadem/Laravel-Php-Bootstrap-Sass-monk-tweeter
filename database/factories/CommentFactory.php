<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'tweet_id'  =>  $faker->numberBetween(1, $GLOBALS['userCount'] * 25),
        'body'      =>  $faker->realText($faker->numberBetween(30, 200))
    ];
});
