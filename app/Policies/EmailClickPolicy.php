<?php

namespace App\Policies;

use App\Models\EmailClick;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EmailClickPolicy
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
        if ($user->can('email-click-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  EmailClick $email_click
     * @return mixed
     */
    public function view(User $user, EmailClick $email_click)
    {
        if ($user->can('email-click-view')) {
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
        if ($user->can('email-click-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  EmailClick $email_click
     * @return mixed
     */
    public function update(User $user, EmailClick $email_click)
    {
        if ($user->id == $email_click->user_id) {
            return Response::allow();
        }
        if ($user->can('email-click-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  EmailClick $email_click
     * @return mixed
     */
    public function delete(User $user, EmailClick $email_click)
    {
        if ($user->id == $email_click->user_id) {
            return Response::allow();
        }
        if ($user->can('email-click-destroy')) {
            return Response::allow();
        }
    }
}
