<?php

namespace App\Policies;

use App\Models\ClientFeedReportAssociation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ClientFeedReportAssociationPolicy
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
        if ($user->can('client-feed-report-association-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ClientFeedReportAssociation $client_feed_report_association
     * @return mixed
     */
    public function view(User $user, ClientFeedReportAssociation $client_feed_report_association)
    {
        if ($user->can('client-feed-report-association-view')) {
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
        if ($user->can('client-feed-report-association-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ClientFeedReportAssociation $client_feed_report_association
     * @return mixed
     */
    public function update(User $user, ClientFeedReportAssociation $client_feed_report_association)
    {
        if ($user->can('client-feed-report-association-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ClientFeedReportAssociation $client_feed_report_association
     * @return mixed
     */
    public function delete(User $user, ClientFeedReportAssociation $client_feed_report_association)
    {
        if ($user->can('client-feed-report-association-destroy')) {
            return Response::allow();
        }
    }
}
