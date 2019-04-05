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
}
