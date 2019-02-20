<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'owner_id' => function(){
            // This will create a new User, persist it to the database and then return their ID
            return factory(App\User::class)->create()->id;
        }
    ];
});
