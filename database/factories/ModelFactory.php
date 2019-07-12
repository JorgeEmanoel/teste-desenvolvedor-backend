<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'nome' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('asdasd'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Cliente::class, function (Faker\Generator $faker) {

    return [
        'nome' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'cpf' => $faker->unique()->numerify('###########'),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Produto::class, function (Faker\Generator $faker) {

    return [
        'nome' => $faker->firstName,
        'codigo_de_barras' => str_random(20),
        'valor_unitario' => $faker->randomFloat(2, 1, 999999),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Pedido::class, function (Faker\Generator $faker) {

    return [
        'quantidade' => rand(1, 30),
        'status' => rand(0, 2),
        'data'  => Carbon\Carbon::now('America/Recife')->addDays(rand(1, 50))->format('d/m/Y H:i:s'),
        'produto_id' => rand(1, 20),
        'cliente_id' => rand(1, 20),
    ];
});
