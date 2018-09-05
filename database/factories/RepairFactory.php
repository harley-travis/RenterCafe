<?php

use Faker\Generator as Faker;

$factory->define(App\Repair::class, function (Faker $faker) {
    return [
        'title' => $faker->title, 
        'type' => 'Alarm System', 
        'description' => $faker->realText, 
        'spent' => $faker->numberBetween(0, 1500), 
        'notes' => $faker->realText, 
        'status' => 'Pending', 
        'property_id' => $faker->numberBetween(0, 3),
    ];
});