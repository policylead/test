<?php

namespace App\Policies;

use App\Models\RssSubscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RssSubscriptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        if ($user->can('rss-subscription-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  RssSubscription $rss_subscription
     * @return mixed
     */
    public function view(User $user, RssSubscription $rss_subscription)
    {
        if ($user->can('rss-subscription-view')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->can('rss-subscription-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  RssSubscription $rss_subscription
     * @return mixed
     */
    public function update(User $user, RssSubscription $rss_subscription)
    {
        if ($user->can('rss-subscription-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  RssSubscription $rss_subscription
     * @return mixed
     */
    public function delete(User $user, RssSubscription $rss_subscription)
    {
        if ($user->can('rss-subscription-destroy')) {
            return Response::allow();
        }
    }
}
