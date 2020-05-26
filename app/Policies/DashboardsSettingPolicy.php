<?php

namespace App\Policies;

use App\Models\DashboardsSetting;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DashboardsSettingPolicy
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
        if ($user->can('dashboard-setting-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  DashboardsSetting $dashboards_setting
     * @return mixed
     */
    public function view(User $user, DashboardsSetting $dashboards_setting)
    {
        if ($user->can('dashboard-setting-view')) {
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
        if ($user->can('dashboard-setting-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  DashboardsSetting $dashboards_setting
     * @return mixed
     */
    public function update(User $user, DashboardsSetting $dashboards_setting)
    {
        if ($user->id == $dashboards_setting->user_id) {
            return Response::allow();
        }
        if ($user->can('dashboard-setting-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  DashboardsSetting $dashboards_setting
     * @return mixed
     */
    public function delete(User $user, DashboardsSetting $dashboards_setting)
    {
        if ($user->id == $dashboards_setting->user_id) {
            return Response::allow();
        }
        if ($user->can('dashboard-setting-destroy')) {
            return Response::allow();
        }
    }
}
