<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Test;

class Question extends Model
{
    protected $fillable = [
        'question_type',
        'constent',
        'test_id',
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
