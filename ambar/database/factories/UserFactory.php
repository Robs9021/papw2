<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

// $factory->define(App\User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//         'remember_token' => str_random(10),
//     ];
// });



$factory->define(App\Empresa::class, function (Faker $faker) {
    return [
        'companyName' => $faker->company
    ];
});

$factory->define(App\Usuario::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'password' => $faker->password,
        'image' => $faker->imageUrl,
        'type' => $faker->numberBetween($min = 2, $max = 3),
        'empresa_id' => $faker->numberBetween($min = 2, $max = 11),
        'usuario_id' => 1
    ];
});