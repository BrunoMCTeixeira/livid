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
        'name'            => $faker->name,
        'role_id'         => 1,
        'status_id'       => 1,
        'username'        => $faker->userName,
        'email'           => $faker->unique()->safeEmail,
        'password'        => $password ?: $password = bcrypt('secret'),
        'remember_token'  => str_random(10),
		'country_id'      => 'PT'	
    ];
});


$factory->define(App\Property::class, function (Faker\Generator $faker) {

    return [
        'user_id'             => 2,
        'status_id'           => 1,
        'company_id'          => 1,
        'category_id'         => 1,
        'address_id'          => 1,
        'rank'                => 1
    ];
});
