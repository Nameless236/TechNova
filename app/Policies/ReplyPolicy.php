<?php

namespace App\Policies;

use App\Models\Reply;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReplyPolicy
{
    /**
     * Determine if the user can update a reply.
     */
    public function update(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id || $user->isAdmin();
    }

    /**
     * Determine if the user can delete a reply.
     */
    public function delete(User $user, Reply $reply)
    {
        return $user->id === $reply->user_id || $user->isAdmin();
    }
}
