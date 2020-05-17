<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titulo' => $faker->title,
        'subtitulo' => $faker->title,
        'descricao' => $faker->title,
        'texto' => $faker->title,
        'autor' => $faker->title,
        'tipo' => $faker->title,
        'imageurl'=> $faker->title,

    ];
});

