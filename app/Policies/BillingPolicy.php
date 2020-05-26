<?php

namespace App\Policies;

use App\Models\Billing;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class BillingPolicy
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
        if ($user->can('billing-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Billing $billing
     * @return mixed
     */
    public function view(User $user, Billing $billing)
    {
        if ($user->can('billing-view')) {
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
        if ($user->can('billing-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Billing $billing
     * @return mixed
     */
    public function update(User $user, Billing $billing)
    {
        if ($user->id == $billing->user_id) {
            return Response::allow();
        }
        if ($user->can('billing-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Billing $billing
     * @return mixed
     */
    public function delete(User $user, Billing $billing)
    {
        if ($user->id == $billing->user_id) {
            return Response::allow();
        }
        if ($user->can('billing-destroy')) {
            return Response::allow();
        }
    }
}
