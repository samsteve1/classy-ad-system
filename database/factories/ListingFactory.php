<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Listing;
use Faker\Generator as Faker;

$factory->define(Listing::class, function (Faker $faker) {
    return [
        'title' => $faker->words($nb = 10, $asText = true),
        'body'  => $faker->sentence(),
        'user_id' =>   mt_rand(1, 100),
        'area_id' =>    mt_rand(3, 82),
        'category_id'  => mt_rand(2, 36),
        'live' => 1
    ];
});
