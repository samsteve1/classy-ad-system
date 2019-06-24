<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph,
        'body'  => $faker->text,
        'user_id' =>   mt_rand(1, 50),
        'area_id' =>    mt_rand(3, 58),
        'category_id'  => mt_rand(2, 25),
        'live' => 1
    ];
});
