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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'admin',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Preference::class, function ($faker) {
    return [
        'country' => rand(1,100),
        'currency' => rand(300,500),
        'subscribe_mailing_list' => rand(0,1),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
