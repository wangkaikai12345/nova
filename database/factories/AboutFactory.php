<?php

use Faker\Generator as Faker;

$factory->define(App\About::class, function (Faker $faker) {
    return [
        //
        'introduction'       => $faker->sentence,
        'content'       => $faker->paragraph,
    ];
});
