<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Equipment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class EquipmentPolicy
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
        if ($user->can('equipment index')) {
            return true;
        }
        return false;

    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Equipment $equipment
     * @return bool
     */
    public function view(User $user, Equipment $equipment): bool
    {
        if ($user->can('equipment show')) {
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
        if ($user->can('equipment create')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Equipment $equipment
     * @return bool
     */
    public function update(User $user, Equipment $equipment): bool
    {
        if ($user->can('equipment update')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Equipment $equipment
     * @return bool
     */
    public function delete(User $user, Equipment $equipment) : bool
    {
        if ($user->can('equipment delete')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Equipment $equipment
     * @return void
     */
    public function restore(User $user, Equipment $equipment)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Equipment $equipment
     * @return Response|bool
     */
    public function forceDelete(User $user, Equipment $equipment)
    {
        //
    }
}
