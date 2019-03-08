<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Test;
use App\Models\Question;

class Question extends Model
{
    protected $fillable = [
        'question_type',
        'constent',
        'option',
        'is_correct',
    ];

    public function test()
    {
        return $this->belongsTo(Tets::class);
    }
}
