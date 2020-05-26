<?php

namespace App\Policies;

use App\Models\FacebookAccount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FacebookAccountPolicy
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
        if ($user->can('facebook-account-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  FacebookAccount $facebook_account
     * @return mixed
     */
    public function view(User $user, FacebookAccount $facebook_account)
    {
        if ($user->can('facebook-account-view')) {
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
        if ($user->can('facebook-account-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  FacebookAccount $facebook_account
     * @return mixed
     */
    public function update(User $user, FacebookAccount $facebook_account)
    {
        if ($user->can('facebook-account-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  FacebookAccount $facebook_account
     * @return mixed
     */
    public function delete(User $user, FacebookAccount $facebook_account)
    {
        if ($user->can('facebook-account-destroy')) {
            return Response::allow();
        }
    }
}
