<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Option;

class OptionRepository extends BaseRepository
{
    public function model()
    {
        return Option::class;
    }
}
