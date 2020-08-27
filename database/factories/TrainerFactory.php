<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainer;
use Faker\Generator as Faker;

$factory->define(Trainer::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class),
        'code' => $faker->uuid,
        'name' => $faker->userName(),
        'level' => $faker->numberBetween(1,40),
        'pokedex' => $faker->numberBetween(1,608),
        'team' => $faker->colorName(),
    ];
});
