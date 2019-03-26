<?php

namespace App\Traits;

trait FollowTrait
{
    public function followings()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'user_id', 'follow_id')->withTimestamps();
    }

    /**
     * Check if user is following given user.
     *
     * @param $user
     *
     * @return bool
     */
    public function isFollowing($user)
    {
        return $this->followings->contains($user);
    }

    /**
     * Unfollow a user or users.
     *
     * @param int|array $user
     *
     * @return int
     */
    public function unFollowing($user)
    {
        return $this->followings()->detach((array)$user);
    }

    /**
     * Follow a user or users.
     *
     * @param int|array $user
     *
     * @return int
     */
    public function follow($user)
    {
        return $this->followings()->sync((array)$user, false);
    }

    /**
     * Return user followers.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        return $this->belongsToMany(__CLASS__, 'followers', 'follow_id', 'user_id')->withTimestamps();
    }
}
