<?php

namespace App\Policies;

use App\Models\Alert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class AlertPolicy
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
        if ($user->can('alert-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Alert $alert
     * @return mixed
     */
    public function view(User $user, Alert $alert)
    {
        if ($user->can('alert-view')) {
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
        if ($user->can('alert-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Alert $alert
     * @return mixed
     */
    public function update(User $user, Alert $alert)
    {
        if ($user->id == $alert->user_id) {
            return Response::allow();
        }
        if ($user->can('alert-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Alert $alert
     * @return mixed
     */
    public function delete(User $user, Alert $alert)
    {
        if ($user->id == $alert->user_id) {
            return Response::allow();
        }
        if ($user->can('alert-destroy')) {
            return Response::allow();
        }
    }
}
