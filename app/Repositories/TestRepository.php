<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Test;

class TestRepository extends BaseRepository
{
    public function model()
    {
        return Test::class;
    }

    public function randomOrder(Test $test, $value)
    {
        return $test->questions()->inRandomOrder()->limit($value)->get();
    }

    public function calculateScore($questions, $option, $request)
    {
        $score = 0;
        $options = [];

        foreach ($questions as $key => $question)
        {
            $options[$key] = $request->input('answers.'. $question) != null ? $request->input('answers.'. $question) : null;
        }

        $results = $option->findWhereIn('id', $options);
        foreach ($results as $result)
        {
            $score = $result->is_correct == 1 ? $score + 1 : $score;
        }

        return $score;
    }
}
