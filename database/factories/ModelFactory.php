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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->firstNameMale,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'tel' => $faker->e164PhoneNumber,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'created_at' => $faker->dateTimeThisMonth($max = 'now'),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'price' => $faker->numberBetween($min = 3500, $max = 25000),
        'description' => $faker->realText($maxNbChars = 200) ,
        'name' => $faker->streetAddress,
        'created_at' => $faker->dateTimeThisMonth($max = 'now'),
        'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
        'user_id' => $faker->numberBetween($min = 1, $max = 25),
        'category_id' => $faker->randomElement($array = array ('1','2','3','4')),
    ];


});
