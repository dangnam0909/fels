<?php

use Faker\Generator as Faker;
use App\Models\Question;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_type' => 'Single Choice',
        'constent' => $faker->sentence(mt_rand(3,10)),
        'test_id' => App\Models\Test::all()->random()->id,
    ];
});
