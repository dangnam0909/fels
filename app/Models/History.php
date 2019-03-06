<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lesson;

class History extends Model
{
    protected $fillable = [
        'content',        
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
