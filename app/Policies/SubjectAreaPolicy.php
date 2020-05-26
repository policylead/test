<?php

namespace App\Policies;

use App\Models\SubjectArea;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SubjectAreaPolicy
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
        if ($user->can('subject-area-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  SubjectArea $subject_area
     * @return mixed
     */
    public function view(User $user, SubjectArea $subject_area)
    {
        if ($user->can('subject-area-view')) {
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
        if ($user->can('subject-area-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  SubjectArea $subject_area
     * @return mixed
     */
    public function update(User $user, SubjectArea $subject_area)
    {
        if ($user->can('subject-area-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  SubjectArea $subject_area
     * @return mixed
     */
    public function delete(User $user, SubjectArea $subject_area)
    {
        if ($user->can('subject-area-destroy')) {
            return Response::allow();
        }
    }
}
