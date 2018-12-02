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

$factory->define(App\Daily::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'language_id' => $faker->randomElement($array = array (1,2)),
        'title' => $faker->realText($maxNbChars = 20),
        'body' => $faker->realText,
    ];
});
// 'user_id' => $faker->randomDigit,