<?php

namespace App\Policies;

use App\Models\FeedsDuplicate;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FeedsDuplicatePolicy
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
        if ($user->can('feed-duplicate-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  FeedsDuplicate $feeds_duplicate
     * @return mixed
     */
    public function view(User $user, FeedsDuplicate $feeds_duplicate)
    {
        if ($user->can('feed-duplicate-view')) {
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
        if ($user->can('feed-duplicate-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  FeedsDuplicate $feeds_duplicate
     * @return mixed
     */
    public function update(User $user, FeedsDuplicate $feeds_duplicate)
    {
        if ($user->can('feed-duplicate-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  FeedsDuplicate $feeds_duplicate
     * @return mixed
     */
    public function delete(User $user, FeedsDuplicate $feeds_duplicate)
    {
        if ($user->can('feed-duplicate-destroy')) {
            return Response::allow();
        }
    }
}
