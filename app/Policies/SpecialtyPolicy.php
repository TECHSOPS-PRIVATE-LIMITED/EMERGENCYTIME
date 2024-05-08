<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class SpecialtyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->can('specialty index')
            ? Response::allow()
            : Response::deny('You do not have permission to view specialties.');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param Specialty $specialty
     * @return Response|bool
     */
    public function view(User $user, Specialty $specialty): Response|bool
    {
        return $user->can('specialty show')
            ? Response::allow()
            : Response::deny('You do not have permission to view this specialty.');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $user->can('specialty create')
            ? Response::allow()
            : Response::deny('You do not have permission to create a specialty.');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param Specialty $specialty
     * @return Response|bool
     */
    public function update(User $user, Specialty $specialty): Response|bool
    {
        return $user->can('specialty update')
            ? Response::allow()
            : Response::deny('You do not have permission to update this specialty.');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param Specialty $specialty
     * @return Response|bool
     */
    public function delete(User $user, Specialty $specialty): Response|bool
    {
        return $user->can('specialty delete')
            ? Response::allow()
            : Response::deny('You do not have permission to delete this specialty.');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Specialty $specialty
     * @return Response|bool
     */
    public function restore(User $user, Specialty $specialty): Response|bool
    {
        // Restore might be an additional permission, e.g., 'specialty restore'
//        return $user->can('specialty restore')
//            ? Response::allow()
//            : Response::deny('You do not have permission to restore this specialty.');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Specialty $specialty
     * @return Response|bool
     */
    public function forceDelete(User $user, Specialty $specialty): Response|bool
    {
        // This might be a more restricted permission, like 'specialty force delete'
//        return $user->can('specialty force delete')
//            ? Response::allow()
//            : Response::deny('You do not have permission to permanently delete this specialty.');
    }
}
