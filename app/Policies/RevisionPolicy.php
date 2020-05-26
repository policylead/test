<?php

namespace App\Policies;

use App\Models\Revision;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RevisionPolicy
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
        if ($user->can('revision-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Revision $revision
     * @return mixed
     */
    public function view(User $user, Revision $revision)
    {
        if ($user->can('revision-view')) {
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
        if ($user->can('revision-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Revision $revision
     * @return mixed
     */
    public function update(User $user, Revision $revision)
    {
        if ($user->id == $revision->user_id) {
            return Response::allow();
        }
        if ($user->can('revision-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Revision $revision
     * @return mixed
     */
    public function delete(User $user, Revision $revision)
    {
        if ($user->id == $revision->user_id) {
            return Response::allow();
        }
        if ($user->can('revision-destroy')) {
            return Response::allow();
        }
    }
}
