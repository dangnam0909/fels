<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Word;
use App\Models\User;

class Memory extends Model
{
    protected $fillable = [
    	'user_id',
    	'word_id',
    	'status',
    	'learn_time',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
