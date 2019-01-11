<?php

use Faker\Generator as Faker;

$factory->define(App\Libro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->jobTitle,
        'autor'  => $faker->name,
        'numero' => $faker->numberBetween(0,100)
    ];
});
