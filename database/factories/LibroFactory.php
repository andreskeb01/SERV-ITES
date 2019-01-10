<?php

use Faker\Generator as Faker;

$factory->define(App\Libro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->randomLetter,
        'autor'  => $faker->firstName,
        'numero' => $faker->numberBetween(0,100)
    ];
});
