<?php

use Faker\Generator as Faker;

$factory->define(App\Materias::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'clave'  => $faker->numerify(),
        //
    ];
});
