<?php

namespace App\Policies;

use App\Models\Report;
use App\Models\ClientFeedReportAssociation;
use App\Models\ReportsEmailClick;
use App\Models\ReportsScheduled;
use App\Models\ReportsVersion;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportPolicy
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
        if ($user->can('report-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function view(User $user, Report $report)
    {
        if ($user->can('report-view')) {
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
        if ($user->can('report-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function update(User $user, Report $report)
    {
        if ($user->id == $report->user_id) {
            return Response::allow();
        }
        if ($user->can('report-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function delete(User $user, Report $report)
    {
        if ($user->id == $report->user_id) {
            return Response::allow();
        }
        if ($user->can('report-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function searchClientFeedReportAssociations(User $user, Report $report)
    {
        if ($user->can('report-search-client-feed-report-associations')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function searchReportsEmailClicks(User $user, Report $report)
    {
        if ($user->can('report-search-reports-email-clicks')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function searchReportsScheduleds(User $user, Report $report)
    {
        if ($user->can('report-search-reports-scheduleds')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Report $report
     * @return mixed
     */
    public function searchReportsVersions(User $user, Report $report)
    {
        if ($user->can('report-search-reports-versions')) {
            return Response::allow();
        }
    }
}
