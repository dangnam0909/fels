<?php

namespace App\Models;

use App\Models\Memory;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $fillable = [
    	'word_name',
    	'picture',
    	'sound',
    	'translate',
        'lesson_id',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'memories', 'word_id', 'user_id');
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
