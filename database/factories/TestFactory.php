<?php

use Faker\Generator as Faker;
use App\Models\Test;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'test_name' => $faker->sentence(mt_rand(3,10)),
        'lesson_id' => App\Models\Lesson::all()->random()->id,
        'time' => '00:10:00',
    ];
});
