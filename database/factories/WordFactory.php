<?php

use Faker\Generator as Faker;
use App\Models\Word;

$factory->define(App\Models\Word::class, function (Faker $faker) {
    return [
        'word_name' => $faker->sentence(1, 3),
        'picture' => 'delete.png',
        'sound' => 'ignore.mp3',
        'translate' => $faker->sentence(7, 15),
        'lesson_id' => App\Models\Lesson::all()->random()->id,
    ];
});
