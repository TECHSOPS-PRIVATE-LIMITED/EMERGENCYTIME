<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\MedicalStaff;
use App\Models\User;

class MedicalStaffPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any medical staff records.
     *
     * @param User $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('medical_staff index');
    }

    /**
     * Determine whether the user can view a specific medical staff record.
     *
     * @param User $user
     * @param MedicalStaff $medicalStaff
     * @return bool
     */
    public function view(User $user, MedicalStaff $medicalStaff): bool
    {
        return $user->can('medical_staff show');
    }

    /**
     * Determine whether the user can create medical staff records.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('medical_staff create');
    }

    /**
     * Determine whether the user can update a specific medical staff record.
     *
     * @param User $user
     * @param MedicalStaff $medicalStaff
     * @return bool
     */
    public function update(User $user, MedicalStaff $medicalStaff): bool
    {
        return $user->can('medical_staff update');
    }

    /**
     * Determine whether the user can delete a specific medical staff record.
     *
     * @param User $user
     * @param MedicalStaff $medicalStaff
     * @return bool
     */
    public function delete(User $user, MedicalStaff $medicalStaff): bool
    {
        return $user->can('medical_staff delete');
    }

    /**
     * Determine whether the user can restore a deleted medical staff record.
     *
     * @param User $user
     * @param MedicalStaff $medicalStaff
     * @return bool
     */
    public function restore(User $user, MedicalStaff $medicalStaff): bool
    {
//        return $user->can('medical_staff restore'); // Custom permission
    }

    /**
     * Determine whether the user can permanently delete a medical staff record.
     *
     * @param User $user
     * @param MedicalStaff $medicalStaff
     * @return bool
     */
    public function forceDelete(User $user, MedicalStaff $medicalStaff): bool
    {
//        return $user->can('medical_staff force delete'); // Custom permission
    }
}
