<?php

namespace App\Traits;

trait FollowTrait
{
    public function followings()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'user_id', 'follow_id')->withTimestamps();
    }
}
