<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Result;

class ResultRepository extends BaseRepository
{
    public function model()
    {
        return Result::class;
    }
}
