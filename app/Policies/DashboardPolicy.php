<?php

namespace App\Policies;

use App\Models\Dashboard;
use App\Models\Bookmark;
use App\Models\DashboardsKeyword;
use App\Models\DashboardsSetting;
use App\Models\SentEmailAlert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DashboardPolicy
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
        if ($user->can('dashboard-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function view(User $user, Dashboard $dashboard)
    {
        if ($user->can('dashboard-view')) {
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
        if ($user->can('dashboard-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function update(User $user, Dashboard $dashboard)
    {
        if ($user->id == $dashboard->user_id) {
            return Response::allow();
        }
        if ($user->can('dashboard-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function delete(User $user, Dashboard $dashboard)
    {
        if ($user->id == $dashboard->user_id) {
            return Response::allow();
        }
        if ($user->can('dashboard-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function searchBookmarks(User $user, Dashboard $dashboard)
    {
        if ($user->can('dashboard-search-bookmarks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function searchDashboardsKeywords(User $user, Dashboard $dashboard)
    {
        if ($user->can('dashboard-search-dashboards-keywords')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function searchDashboardsSettings(User $user, Dashboard $dashboard)
    {
        if ($user->can('dashboard-search-dashboards-settings')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Dashboard $dashboard
     * @return mixed
     */
    public function searchSentEmailAlerts(User $user, Dashboard $dashboard)
    {
        if ($user->can('dashboard-search-sent-email-alerts')) {
            return Response::allow();
        }
    }
}
