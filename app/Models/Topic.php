<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class Topic extends Model
{
    protected $fillable = [
        'topic_name',
        'description',
        'picture',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_topic', 'topic_id', 'user_id')->withTimestamps();
    }

    public static function uploadImage($field)
    {
        if (Request::hasFile($field))
        {
            $pic = Request::file($field);
            if ($pic->isValid())
            {
                $newName = md5(rand(1, 1000) . $pic->getClientOriginalName()) . "." . $pic->getClientOriginalExtension();
                $pic->move('uploads/topics', $newName);
                return $newName;
            }
        }
        return '';
    }
}
