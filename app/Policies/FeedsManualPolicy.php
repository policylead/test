<?php

namespace App\Policies;

use App\Models\FeedsManual;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class FeedsManualPolicy
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
        if ($user->can('feed-manual-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  FeedsManual $feeds_manual
     * @return mixed
     */
    public function view(User $user, FeedsManual $feeds_manual)
    {
        if ($user->can('feed-manual-view')) {
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
        if ($user->can('feed-manual-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  FeedsManual $feeds_manual
     * @return mixed
     */
    public function update(User $user, FeedsManual $feeds_manual)
    {
        if ($user->can('feed-manual-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  FeedsManual $feeds_manual
     * @return mixed
     */
    public function delete(User $user, FeedsManual $feeds_manual)
    {
        if ($user->can('feed-manual-destroy')) {
            return Response::allow();
        }
    }
}
