<?php

use Faker\Generator as Faker;
use App\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    return [
        'topic_name' => $faker->name,
        'description' => $faker->text,
        'picture' => 'default.jpg',
    ];
});
