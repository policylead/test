<?php

namespace App\Policies;

use App\Models\ReportsScheduled;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsScheduledPolicy
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
        if ($user->can('report-scheduled-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsScheduled $reports_scheduled
     * @return mixed
     */
    public function view(User $user, ReportsScheduled $reports_scheduled)
    {
        if ($user->can('report-scheduled-view')) {
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
        if ($user->can('report-scheduled-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsScheduled $reports_scheduled
     * @return mixed
     */
    public function update(User $user, ReportsScheduled $reports_scheduled)
    {
        if ($user->can('report-scheduled-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsScheduled $reports_scheduled
     * @return mixed
     */
    public function delete(User $user, ReportsScheduled $reports_scheduled)
    {
        if ($user->can('report-scheduled-destroy')) {
            return Response::allow();
        }
    }
}
