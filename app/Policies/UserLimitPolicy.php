<?php

namespace App\Policies;

use App\Models\UserLimit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserLimitPolicy
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
        if ($user->can('user-limit-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  UserLimit $user_limit
     * @return mixed
     */
    public function view(User $user, UserLimit $user_limit)
    {
        if ($user->can('user-limit-view')) {
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
        if ($user->can('user-limit-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  UserLimit $user_limit
     * @return mixed
     */
    public function update(User $user, UserLimit $user_limit)
    {
        if ($user->id == $user_limit->user_id) {
            return Response::allow();
        }
        if ($user->can('user-limit-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  UserLimit $user_limit
     * @return mixed
     */
    public function delete(User $user, UserLimit $user_limit)
    {
        if ($user->id == $user_limit->user_id) {
            return Response::allow();
        }
        if ($user->can('user-limit-destroy')) {
            return Response::allow();
        }
    }
}
