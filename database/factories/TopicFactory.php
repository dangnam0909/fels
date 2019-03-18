<?php

use Faker\Generator as Faker;
use App\Models\Topic;

$factory->define(Topic::class, function (Faker $faker) {
    $topic_name = $faker->sentence(mt_rand(3,10));
    return [
        'topic_name' => $topic_name,
        'description' => $faker->text,
        'slug' => Str::slug($topic_name),
        'picture' => 'default.jpg',
    ];
});
