<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'       => $faker->sentence,
        'content'     => $faker->paragraph,
        'views'       => $faker->numberBetween(1, 1000)
    ];
});
