<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;
use Ramsey\Uuid\Rfc4122\UuidV4;

$factory->define(Categoria::class, function (Faker $faker) {

    return [
        'nome' => $faker->name,
        'usuario_id' => 1,
        'uuid' => UuidV4::uuid4()
    ];
});
