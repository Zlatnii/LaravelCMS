<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Page;

class PagePolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Page $page)
    {
        return $user->id === $page->user_id;
    }

    public function delete(User $user, Page $page)
    {
        return $user->id === $page->user_id;
    }

    public function updateAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete any page.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user)
    {
        return $user->isAdmin();
    }
}
