<?php

namespace App\Policies;

use App\Models\ClientFeed;
use App\Models\ClientFeedReportAssociation;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ClientFeedPolicy
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
        if ($user->can('client-feed-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ClientFeed $client_feed
     * @return mixed
     */
    public function view(User $user, ClientFeed $client_feed)
    {
        if ($user->can('client-feed-view')) {
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
        if ($user->can('client-feed-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ClientFeed $client_feed
     * @return mixed
     */
    public function update(User $user, ClientFeed $client_feed)
    {
        if ($user->id == $client_feed->user_id) {
            return Response::allow();
        }
        if ($user->can('client-feed-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ClientFeed $client_feed
     * @return mixed
     */
    public function delete(User $user, ClientFeed $client_feed)
    {
        if ($user->id == $client_feed->user_id) {
            return Response::allow();
        }
        if ($user->can('client-feed-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  ClientFeed $client_feed
     * @return mixed
     */
    public function searchClientFeedReportAssociations(User $user, ClientFeed $client_feed)
    {
        if ($user->can('client-feed-search-client-feed-report-associations')) {
            return Response::allow();
        }
    }
}
