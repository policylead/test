<?php

namespace App\Policies;

use App\Models\StakeholdersList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StakeholdersListPolicy
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
        if ($user->can('stakeholder-list-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  StakeholdersList $stakeholders_list
     * @return mixed
     */
    public function view(User $user, StakeholdersList $stakeholders_list)
    {
        if ($user->can('stakeholder-list-view')) {
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
        if ($user->can('stakeholder-list-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  StakeholdersList $stakeholders_list
     * @return mixed
     */
    public function update(User $user, StakeholdersList $stakeholders_list)
    {
        if ($user->can('stakeholder-list-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  StakeholdersList $stakeholders_list
     * @return mixed
     */
    public function delete(User $user, StakeholdersList $stakeholders_list)
    {
        if ($user->can('stakeholder-list-destroy')) {
            return Response::allow();
        }
    }
}
