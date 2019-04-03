<?php

namespace App\Models;

use App\Models\History;
use App\Models\Test;
use App\Models\Word;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\FollowTrait;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use FollowTrait, Notifiable;

    protected $fillable = [
        'full_name',
        'password',
        'email',
        'gender',
        'date_of_birthday',
        'avatar',
        'provider_user_id',
        'provider',
        'avatar',
        'role_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function words()
    {
        return $this->belongsToMany(Word::class, 'memories', 'user_id', 'word_id')
            ->withPivot('id', 'status', 'learn_time')
            ->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class);
    }

    public function historys()
    {
        return $this->hasMany(History::class);
    }

    public function topics()
    {
        return $this->belongsToMany(Topic::class, 'user_topic', 'user_id', 'topic_id')->withTimestamps();
    }

    public function isRoleAdmin()
    {
        return $this->role()->where('id', config('setting.role_ad'))->exists();
    }

    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function getAvatarAttribute($value)
    {
        return isset($value) ? config('setting.avatar.path') . $value : config('setting.avatar.default');
    }
}
