<?php

namespace App\Policies;

use App\Models\User;

/**
 * Caution! Because the policy on default gets the current authenticated user,
 * variable names are used in the following senses:
 * $user - current authenticated user;
 * $profile - some user profile from the database.
 */
class UserPolicy
{
    /**
     * root profile can edit only root.
     */
    public function isRootEdited($user, User $profile)
    {
        if ($profile->role != 'root') {
            return true;
        }
        elseif ($profile->role == 'root' and $user->role == 'root') {
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * root profile cannot be deleted.
     */
    public function isRootDeleted($user, User $profile)
    {
        if ($profile->role != 'root') {
            return true;
        }
        else{
            return false;
        }
    }
}
