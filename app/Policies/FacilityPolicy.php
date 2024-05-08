<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Facility;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class FacilityPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        if ($user->can('facility index')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return bool
     */
    public function view(User $user, Facility $facility): bool
    {
        if ($user->can('facility show')) {
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
    public function create(User $user): bool
    {
        if ($user->can('facility create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return bool
     */
    public function update(User $user, Facility $facility) : bool
    {
        if ($user->can('facility update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return bool
     */
    public function delete(User $user, Facility $facility): bool
    {
        if ($user->can('facility delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return void
     */
    public function restore(User $user, Facility $facility)
    {

    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Facility $facility
     * @return void
     */
    public function forceDelete(User $user, Facility $facility)
    {
        //
    }
}
