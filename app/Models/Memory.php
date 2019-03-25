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

    public function words()
    {
        return $this->belongsToMany(Word::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
