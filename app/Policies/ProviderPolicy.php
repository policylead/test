<?php

namespace App\Policies;

use App\Models\Provider;
use App\Models\Document;
use App\Models\Feed;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ProviderPolicy
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
        if ($user->can('provider-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Provider $provider
     * @return mixed
     */
    public function view(User $user, Provider $provider)
    {
        if ($user->can('provider-view')) {
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
        if ($user->can('provider-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Provider $provider
     * @return mixed
     */
    public function update(User $user, Provider $provider)
    {
        if ($user->can('provider-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Provider $provider
     * @return mixed
     */
    public function delete(User $user, Provider $provider)
    {
        if ($user->can('provider-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Provider $provider
     * @return mixed
     */
    public function searchDocuments(User $user, Provider $provider)
    {
        if ($user->can('provider-search-documents')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Provider $provider
     * @return mixed
     */
    public function searchFeeds(User $user, Provider $provider)
    {
        if ($user->can('provider-search-feeds')) {
            return Response::allow();
        }
    }
}
