<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Raid;
use Faker\Generator as Faker;

$factory->define(Raid::class, function (Faker $faker) {
    return [
        'trainer_id' => factory(\App\Trainer::class),
//        'party' => '1',
        'name' => $faker->name,
        'level' => $faker->numberBetween(1,5),
        'party_size' => $faker->numberBetween(5,10),
/*        'start_time' => $faker->dateTime('now'),
        'status' => $faker->boolean(),*/
        'weather_boost' => $faker->boolean(),

/*        'user_id' => factory(\App\User::class),
        'host_trainer_id' => $faker->numberBetween(000000000001,999999999999),
        'raid_name' => $faker->name,
        'raid_level' => $faker->numberBetween(1,5),
        'raid_invites' => $faker->userName,*/
    ];
});
