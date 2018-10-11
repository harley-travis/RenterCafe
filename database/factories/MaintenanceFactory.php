<?php

use Faker\Generator as Faker;

$factory->define(App\Maintenance::class, function (Faker $faker) {
    return [

        'subject' => $faker->title, 
        'type' => 'Alarm System', 
        'description' => $faker->realText, 
        'emergency' => $faker->numberBetween(0, 1), 
        'permission' => $faker->numberBetween(0, 1), 
        'status' => 'Pending', 
        'property_id' => $faker->numberBetween(0, 3), 
        'user_id' => $faker->numberBetween(0, 3), 
        'repair_id' => $faker->numberBetween(0, 3), 

    ];
});
