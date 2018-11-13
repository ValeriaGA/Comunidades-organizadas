<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'second_last_name' => $faker->lastName,
        'official_id' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'sex' => 'm',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Incident::class, function (Faker $faker) {
    return [
    	'user_id' => function()
    	{
    		return factory(App\User::class)->create()->id;
    	},
    	'type_id' => $faker->randomDigit,
    	'weapon_id' => (($faker->randomNumber($nbDigits = NULL, $strict = false))%7)+1,
    	'transportation_id' => (($faker->randomNumber($nbDigits = NULL, $strict = false))%5)+1,
    	'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
    	'time' => $faker->time($format = 'H:i:s', $max = 'now'),
    	'location' => $faker->word,
    	'longitud' => $faker->longitude($min = -180, $max = 180),
    	'latitud' => $faker->latitude($min = -90, $max = 90),
    	'description' => $faker->paragraph,
    	'perpetrators' => $faker->randomDigit,
    	'victims' => (($faker->randomDigit)%3)+1,
    	'primary_victim_sex' => 'm'
    ];
});