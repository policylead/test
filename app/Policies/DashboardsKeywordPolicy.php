<?php

namespace App\Policies;

use App\Models\DashboardsKeyword;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DashboardsKeywordPolicy
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
        if ($user->can('dashboard-keyword-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  DashboardsKeyword $dashboards_keyword
     * @return mixed
     */
    public function view(User $user, DashboardsKeyword $dashboards_keyword)
    {
        if ($user->can('dashboard-keyword-view')) {
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
        if ($user->can('dashboard-keyword-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  DashboardsKeyword $dashboards_keyword
     * @return mixed
     */
    public function update(User $user, DashboardsKeyword $dashboards_keyword)
    {
        if ($user->can('dashboard-keyword-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  DashboardsKeyword $dashboards_keyword
     * @return mixed
     */
    public function delete(User $user, DashboardsKeyword $dashboards_keyword)
    {
        if ($user->can('dashboard-keyword-destroy')) {
            return Response::allow();
        }
    }
}
