<?php

use Faker\Generator as Faker;

$factory->define(App\Work::class, function (Faker $faker) {


    //随机取一个月以内的时间.
    $time = $faker->dateTimeThisMonth();

    return [
        //
        'title'       => $faker->sentence(2),
        'author'      => $faker->name,
        'cover'       => 'rI9VPcsCnbkoSoEaqrbqxzzbKmiERCRpRIEnwxd4.jpeg',
        'introduction'       => $faker->sentence(5),
        'content'       => $faker->text(),
        'views'       => $faker->numberBetween(1, 1000),
        'votes'       => $faker->numberBetween(1, 1000),
        'end_time'    => $time
    ];

});
