<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\Topic;
use App\Models\Word;
use App\Models\Test;

class Lesson extends Model
{
    protected $fillable = [
        'lesson_name',
        'picture',
        'description',
        'topic_id',
    ];

    public function historys()
    {
        return $this->hasMany(History::class);
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function words()
    {
        return $this->hasMany(Word::class);
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }
}
