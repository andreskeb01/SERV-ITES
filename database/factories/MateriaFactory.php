<?php

use Faker\Generator as Faker;

$factory->define(App\Materia::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'clave'  => $faker->numerify()
    ];
});
