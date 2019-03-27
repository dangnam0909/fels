<?php

namespace App\Models;

use App\Models\Memory;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

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
        return $this->belongsToMany(User::class, 'memories', 'word_id', 'user_id')
            ->withPivot('id', 'status', 'learn_time')
            ->withTimestamps();
    }

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function hasMemories($wordId)
    {
        foreach (Auth::user()->words as $word) {
            if ($word->pivot->word_id == $wordId && $word->pivot->status == 1) {
                return true;
            }
        }
        return false;
    }
}
