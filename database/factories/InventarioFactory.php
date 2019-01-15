<?php

use Faker\Generator as Faker;

$factory->define(App\Inventario::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'num_serie'  => $faker->bankAccountNumber,
        'modelo' => $faker->name,
        'descripcion' => $faker->sentence,
        'clave'  => $faker->name

    ];
});
