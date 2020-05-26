<?php

namespace App\Policies;

use App\Models\Feed;
use App\Models\FeedsManual;
use App\Models\RssSubscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FeedPolicy
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
        if ($user->can('feed-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Feed $feed
     * @return mixed
     */
    public function view(User $user, Feed $feed)
    {
        if ($user->can('feed-view')) {
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
        if ($user->can('feed-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Feed $feed
     * @return mixed
     */
    public function update(User $user, Feed $feed)
    {
        if ($user->can('feed-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Feed $feed
     * @return mixed
     */
    public function delete(User $user, Feed $feed)
    {
        if ($user->can('feed-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Feed $feed
     * @return mixed
     */
    public function searchFeedsManuals(User $user, Feed $feed)
    {
        if ($user->can('feed-search-feeds-manuals')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Feed $feed
     * @return mixed
     */
    public function searchRssSubscriptions(User $user, Feed $feed)
    {
        if ($user->can('feed-search-rss-subscriptions')) {
            return Response::allow();
        }
    }
}
