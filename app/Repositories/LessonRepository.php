<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Lesson;

class LessonRepository extends BaseRepository
{
    public function model()
    {
        return Lesson::class;
    }
}
