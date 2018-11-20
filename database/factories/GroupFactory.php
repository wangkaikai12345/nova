<?php

use Faker\Generator as Faker;

$factory->define(App\Group::class, function (Faker $faker) {

    //随机取一个月以内的时间.
    $time = $faker->dateTimeThisMonth();

    return [
        //
        'title'       => $faker->sentence(2),
        'author'      => $faker->name,
        'cover'       => 'onEEI1mAslzxa3ltyPestLEebji5Tgwpsdi9eOD1.jpeg',
        'views'       => $faker->numberBetween(1, 1000),
        'end_time'    => $time
    ];
});
