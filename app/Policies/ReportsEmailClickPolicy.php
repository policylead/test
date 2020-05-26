<?php

namespace App\Policies;

use App\Models\ReportsEmailClick;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsEmailClickPolicy
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
        if ($user->can('report-email-click-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsEmailClick $reports_email_click
     * @return mixed
     */
    public function view(User $user, ReportsEmailClick $reports_email_click)
    {
        if ($user->can('report-email-click-view')) {
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
        if ($user->can('report-email-click-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsEmailClick $reports_email_click
     * @return mixed
     */
    public function update(User $user, ReportsEmailClick $reports_email_click)
    {
        if ($user->can('report-email-click-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsEmailClick $reports_email_click
     * @return mixed
     */
    public function delete(User $user, ReportsEmailClick $reports_email_click)
    {
        if ($user->can('report-email-click-destroy')) {
            return Response::allow();
        }
    }
}
