<?php

use Faker\Generator as Faker;
use App\Models\Option;

$factory->define(Option::class, function (Faker $faker) {
    return [
        'option'=> $faker->sentence(mt_rand(1, 3)),
        'is_correct' => $faker->randomElement([1, 0]),
        'question_id' => App\Models\Question::all()->random()->id,
    ];
});
