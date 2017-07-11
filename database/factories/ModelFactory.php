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
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Project::class, function(Faker\Generator $faker){
    return [
        "title" => $faker->text(8),
        "description" => $faker->text(100)
    ];
});

$factory->define(\App\Server::class, function(\Faker\Generator $faker){
    return [
        "title" => $faker->text(8),
        "description" => $faker->text(100),
        "address" => $faker->randomElement(["www.google.de", "www.spiegel.de", "www.stackoverflow.com", "www.blog.server-status.io"]),
        "timeBetweenRepeats" => 1
    ];
});

$factory->define(\App\ServerStatus::class, function(\Faker\Generator $faker){
    return [
        "status" => $faker->randomElement(["online", "offline", "unknown"])
    ];
});
