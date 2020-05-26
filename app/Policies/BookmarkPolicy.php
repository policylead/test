<?php

namespace App\Policies;

use App\Models\Bookmark;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BookmarkPolicy
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
        if ($user->can('bookmark-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Bookmark $bookmark
     * @return mixed
     */
    public function view(User $user, Bookmark $bookmark)
    {
        if ($user->can('bookmark-view')) {
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
        if ($user->can('bookmark-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Bookmark $bookmark
     * @return mixed
     */
    public function update(User $user, Bookmark $bookmark)
    {
        if ($user->id == $bookmark->user_id) {
            return Response::allow();
        }
        if ($user->can('bookmark-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Bookmark $bookmark
     * @return mixed
     */
    public function delete(User $user, Bookmark $bookmark)
    {
        if ($user->id == $bookmark->user_id) {
            return Response::allow();
        }
        if ($user->can('bookmark-destroy')) {
            return Response::allow();
        }
    }
}
