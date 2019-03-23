<?php

namespace App\Models;

use App\Models\History;
use App\Models\Test;
use App\Models\Word;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lang;
use App\Traits\FollowTrait;

class User extends Authenticatable
{
    use FollowTrait;

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
        'role_id'
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
        return $this->hasMany(Word::class);
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

    public function getGenderAttribute($value)
    {
        return $value == config('setting.male') ? Lang::get('profile.male') : Lang::get('profile.female');
    }

    public function getAvatarAttribute($value)
    {
        return isset($value) ? $value : config('setting.default_avatar');
    }
}
