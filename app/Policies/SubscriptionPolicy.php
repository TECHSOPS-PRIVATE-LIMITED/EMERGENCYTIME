<?php

namespace App\Policies;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any subscriptions.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $user->can('subscription index')
            ? Response::allow()
            : Response::deny('You do not have permission to view subscriptions.');
    }

    /**
     * Determine whether the user can view a specific subscription.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return Response|bool
     */
    public function view(User $user, Subscription $subscription): Response|bool
    {
        // Allow if the user is the owner of the subscription or has a specific permission.
        return ($user->id === $subscription->user_id || $user->can('subscription view'))
            ? Response::allow()
            : Response::deny('You are not authorized to view this subscription.');
    }

    /**
     * Determine whether the user can create a subscription.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $user->can('subscription create')
            ? Response::allow()
            : Response::deny('You do not have permission to create subscriptions.');
    }

    /**
     * Determine whether the user can update a specific subscription.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return Response|bool
     */
    public function update(User $user, Subscription $subscription): Response|bool
    {
        return ($user->can('subscription update'))
            ? Response::allow()
            : Response::deny('You are not authorized to update this subscription.');
    }

    /**
     * Determine whether the user can delete a specific subscription.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return Response|bool
     */
    public function delete(User $user, Subscription $subscription): Response|bool
    {
//        Allow if the user is the owner or has permission to delete subscriptions.
        return ($user->id === $subscription->user_id || $user->can('subscription delete'))
            ? Response::allow()
            : Response::deny('You do not have permission to delete this subscription.');
    }

    /**
     * Determine whether the user can restore a subscription.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return Response|bool
     */
    public function restore(User $user, Subscription $subscription): Response|bool
    {
        // Example: Allow if the user has the 'subscription restore' permission.
        return $user->can('subscription restore')
            ? Response::allow()
            : Response::deny('You are not authorized to restore this subscription.');
    }

    /**
     * Determine whether the user can permanently delete a subscription.
     *
     * @param User $user
     * @param Subscription $subscription
     * @return Response|bool
     */
    public function forceDelete(User $user, Subscription $subscription): Response|bool
    {
        // Example: Allow if the user has the 'subscription force delete' permission.
        return $user->can('subscription force delete')
            ? Response::allow()
            : Response::deny('You do not have permission to permanently delete this subscription.');
    }
}
