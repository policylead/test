<?php

namespace App\Policies;

use App\Models\ReportsVersion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsVersionPolicy
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
        if ($user->can('report-version-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsVersion $reports_version
     * @return mixed
     */
    public function view(User $user, ReportsVersion $reports_version)
    {
        if ($user->can('report-version-view')) {
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
        if ($user->can('report-version-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsVersion $reports_version
     * @return mixed
     */
    public function update(User $user, ReportsVersion $reports_version)
    {
        if ($user->can('report-version-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsVersion $reports_version
     * @return mixed
     */
    public function delete(User $user, ReportsVersion $reports_version)
    {
        if ($user->can('report-version-destroy')) {
            return Response::allow();
        }
    }
}
