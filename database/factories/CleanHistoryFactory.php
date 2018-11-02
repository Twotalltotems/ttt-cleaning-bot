<?php

use Faker\Generator as Faker;

$factory->define(App\CleanHistory::class, function (Faker $faker) {
    return [
        'start_period' => $faker->date(),
        'end_period' => $faker->date()
    ];
});
