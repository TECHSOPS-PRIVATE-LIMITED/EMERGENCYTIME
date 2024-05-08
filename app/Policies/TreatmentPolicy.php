<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TreatmentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user) : bool
    {
        if ($user->can('treatment index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Treatment $treatment
     * @return bool
     */
    public function view(User $user, Treatment $treatment): bool
    {
        if ($user->can('treatment show')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user) : bool
    {
        if ($user->can('treatment create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Treatment $treatment
     * @return bool
     */
    public function update(User $user, Treatment $treatment) : bool
    {
        if ($user->can('treatment update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Treatment $treatment
     * @return bool
     */
    public function delete(User $user, Treatment $treatment) : bool
    {
        if ($user->can('treatment delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Treatment $treatment
     * @return Response|bool
     */
    public function restore(User $user, Treatment $treatment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Treatment $treatment
     * @return Response|bool
     */
    public function forceDelete(User $user, Treatment $treatment)
    {
        //
    }
}
