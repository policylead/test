<?php

namespace App\Policies;

use App\Models\TwitterAccount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TwitterAccountPolicy
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
        if ($user->can('twitter-account-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  TwitterAccount $twitter_account
     * @return mixed
     */
    public function view(User $user, TwitterAccount $twitter_account)
    {
        if ($user->can('twitter-account-view')) {
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
        if ($user->can('twitter-account-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  TwitterAccount $twitter_account
     * @return mixed
     */
    public function update(User $user, TwitterAccount $twitter_account)
    {
        if ($user->can('twitter-account-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  TwitterAccount $twitter_account
     * @return mixed
     */
    public function delete(User $user, TwitterAccount $twitter_account)
    {
        if ($user->can('twitter-account-destroy')) {
            return Response::allow();
        }
    }
}
