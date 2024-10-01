<?php

namespace App\Policies;

use App\Models\Page;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PagePolicy
{


    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Page $page)
    {
        return $user->id === $page->author || $user->role = 'admin';

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole(['editor', 'admin']);

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Page $page)
    {
        return $user->id === $page->author || $user->role = 'admin';

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Page $page)
    {
        return $user->id === $page->author || $user->role = 'admin';

    }


}
