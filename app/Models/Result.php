<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Result;
use App\Models\Test;
use App\Models\word;

class Result extends Model
{
    protected $fillable = [
        'finish_time',
        'user_id',
        'test_id',
        'score',
    ];

    public function word()
    {
        return $this->belongsTo(Word::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
