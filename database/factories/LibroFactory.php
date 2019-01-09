<?php

use Faker\Generator as Faker;

$factory->define(App\Libro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->title,
        'autor'  => $faker->firstName,
        'numero' => $faker->numberBetween(0,100)
    ];
});
