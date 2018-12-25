<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'display_name' => $faker->name,
        'description' => $faker->name,
        'created_at' => now(),
        'updated_at' => now(),
        'type'=>'0'
    ];
});
