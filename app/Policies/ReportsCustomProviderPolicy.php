<?php

namespace App\Policies;

use App\Models\ReportsCustomProvider;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsCustomProviderPolicy
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
        if ($user->can('report-custom-provider-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsCustomProvider $reports_custom_provider
     * @return mixed
     */
    public function view(User $user, ReportsCustomProvider $reports_custom_provider)
    {
        if ($user->can('report-custom-provider-view')) {
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
        if ($user->can('report-custom-provider-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsCustomProvider $reports_custom_provider
     * @return mixed
     */
    public function update(User $user, ReportsCustomProvider $reports_custom_provider)
    {
        if ($user->id == $reports_custom_provider->user_id) {
            return Response::allow();
        }
        if ($user->can('report-custom-provider-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsCustomProvider $reports_custom_provider
     * @return mixed
     */
    public function delete(User $user, ReportsCustomProvider $reports_custom_provider)
    {
        if ($user->id == $reports_custom_provider->user_id) {
            return Response::allow();
        }
        if ($user->can('report-custom-provider-destroy')) {
            return Response::allow();
        }
    }
}
