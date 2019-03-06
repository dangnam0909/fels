<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\UserTopic;

class Topic extends Model
{
    protected $fillable = [
        'topic_name',
        'discription',
        'picture',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function userTopics()
    {
        return $this->hasMany(UserTopic::class);
    }
}
