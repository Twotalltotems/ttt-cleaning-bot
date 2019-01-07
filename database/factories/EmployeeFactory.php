<?php
/**
 * Created by PhpStorm.
 * User: felipepena
 * Date: 2018-11-02
 * Time: 12:36
 */

use Faker\Generator as Faker;

$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'email' => $faker->safeEmail(),
        'active' => 1,
    ];
});