<?php

namespace App\Policies;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ThreadPolicy
{
    public function before(User $user): bool|null
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        return true; // Anyone can view threads
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Thread $thread)
    {
        return true; // Anyone can view threads
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(?User $user)
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id || $user->isAdmin(); // Owner or admin
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Thread $thread)
    {
        return $user->id === $thread->user_id || $user->isAdmin(); // Owner or admin
    }
}
