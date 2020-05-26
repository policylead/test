<?php

namespace App\Policies;

use App\Models\Doctype;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DoctypePolicy
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
        if ($user->can('doctype-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Doctype $doctype
     * @return mixed
     */
    public function view(User $user, Doctype $doctype)
    {
        if ($user->can('doctype-view')) {
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
        if ($user->can('doctype-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Doctype $doctype
     * @return mixed
     */
    public function update(User $user, Doctype $doctype)
    {
        if ($user->can('doctype-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Doctype $doctype
     * @return mixed
     */
    public function delete(User $user, Doctype $doctype)
    {
        if ($user->can('doctype-destroy')) {
            return Response::allow();
        }
    }
}
