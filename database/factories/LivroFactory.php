<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use App\Livro;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Livro::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(8),
        "categoria_id" => Categoria::all()->random()->id, 
        "usuario_id" => User::all()->random()->id,
        'uuid' => Str::uuid(),
        'isbn' => $faker->regexify('[A-Za-z0-9]{13}'),
        'descricao' => $faker->text,
        'nome_autor' => $faker->name,
        'preco' => $faker->randomDigit,
        'ano_publicacao' => $faker->date,
        'editora' =>$faker->company,
        'quantidade_paginas' => $faker->numberBetween($min = 50, $max = 1000),
        'imagem_capa' => $faker->image('public/images',200,200, null, false),
        'st_ativo' => 1
    ];
});
