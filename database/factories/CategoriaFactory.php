<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'nome' => $faker->sentence(1),
        'usuario_id' => User::all()->random()->id,
        'uuid' => Str::uuid()
    ];
});
