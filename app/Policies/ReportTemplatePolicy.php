<?php

namespace App\Policies;

use App\Models\ReportTemplate;
use App\Models\NewsletterSubscription;
use App\Models\Report;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportTemplatePolicy
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
        if ($user->can('report-template-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportTemplate $report_template
     * @return mixed
     */
    public function view(User $user, ReportTemplate $report_template)
    {
        if ($user->can('report-template-view')) {
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
        if ($user->can('report-template-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportTemplate $report_template
     * @return mixed
     */
    public function update(User $user, ReportTemplate $report_template)
    {
        if ($user->can('report-template-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportTemplate $report_template
     * @return mixed
     */
    public function delete(User $user, ReportTemplate $report_template)
    {
        if ($user->can('report-template-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  ReportTemplate $report_template
     * @return mixed
     */
    public function searchNewsletterSubscriptions(User $user, ReportTemplate $report_template)
    {
        if ($user->can('report-template-search-newsletter-subscriptions')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  ReportTemplate $report_template
     * @return mixed
     */
    public function searchReports(User $user, ReportTemplate $report_template)
    {
        if ($user->can('report-template-search-reports')) {
            return Response::allow();
        }
    }
}
