<?php

namespace App\Policies;

use App\Models\ReportsMailingList;
use App\Models\NewsletterSubscription;
use App\Models\ReportsScheduled;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsMailingListPolicy
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
        if ($user->can('report-mailing-list-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsMailingList $reports_mailing_list
     * @return mixed
     */
    public function view(User $user, ReportsMailingList $reports_mailing_list)
    {
        if ($user->can('report-mailing-list-view')) {
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
        if ($user->can('report-mailing-list-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsMailingList $reports_mailing_list
     * @return mixed
     */
    public function update(User $user, ReportsMailingList $reports_mailing_list)
    {
        if ($user->id == $reports_mailing_list->user_id) {
            return Response::allow();
        }
        if ($user->can('report-mailing-list-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsMailingList $reports_mailing_list
     * @return mixed
     */
    public function delete(User $user, ReportsMailingList $reports_mailing_list)
    {
        if ($user->id == $reports_mailing_list->user_id) {
            return Response::allow();
        }
        if ($user->can('report-mailing-list-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  ReportsMailingList $reports_mailing_list
     * @return mixed
     */
    public function searchNewsletterSubscriptions(User $user, ReportsMailingList $reports_mailing_list)
    {
        if ($user->can('report-mailing-list-search-newsletter-subscriptions')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  ReportsMailingList $reports_mailing_list
     * @return mixed
     */
    public function searchReportsScheduleds(User $user, ReportsMailingList $reports_mailing_list)
    {
        if ($user->can('report-mailing-list-search-reports-scheduleds')) {
            return Response::allow();
        }
    }
}
