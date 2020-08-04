<?php

namespace App;

trait Followable
{

    public function follow(User $user)
    {
        return $this->follows()->save($user);
    }

    public function unfollow(User $user)
    {
        return $this->follows()->detach($user);
    }

    public function toggleFollow(User $user)
    {
        if ($this->following($user)) {
            return $this->unfollow($user);
        }

        return $this->follow($user);
    }

    public function follows()
    {
        // defining the many to many relationship
        // specified custom column names below
        return $this->belongsToMany(
            User::class,
            'follows',
            'user_id',
            'following_user_id'
        );
    }

    public function following(User $user)
    {
        // calling follows->exists() without parenthesis it would return a collection of "everything" which can have performance issues on large datasets
        return $this->follows()
            ->where('following_user_id', $user->id)
            ->exists();
    }
}
