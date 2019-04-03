<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Topic;

class TopicRepository extends BaseRepository
{
    public function model()
    {
        return Topic::class;
    }
}
