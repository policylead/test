<?php

namespace App\Policies;

use App\Models\Stakeholder;
use App\Models\StakeholdersKeyword;
use App\Models\StakeholdersList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StakeholderPolicy
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
        if ($user->can('stakeholder-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  Stakeholder $stakeholder
     * @return mixed
     */
    public function view(User $user, Stakeholder $stakeholder)
    {
        if ($user->can('stakeholder-view')) {
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
        if ($user->can('stakeholder-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  Stakeholder $stakeholder
     * @return mixed
     */
    public function update(User $user, Stakeholder $stakeholder)
    {
        if ($user->id == $stakeholder->user_id) {
            return Response::allow();
        }
        if ($user->can('stakeholder-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  Stakeholder $stakeholder
     * @return mixed
     */
    public function delete(User $user, Stakeholder $stakeholder)
    {
        if ($user->id == $stakeholder->user_id) {
            return Response::allow();
        }
        if ($user->can('stakeholder-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Stakeholder $stakeholder
     * @return mixed
     */
    public function searchKeywords(User $user, Stakeholder $stakeholder)
    {
        if ($user->can('stakeholder-search-keywords')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  Stakeholder $stakeholder
     * @return mixed
     */
    public function searchStakeholdersList(User $user, Stakeholder $stakeholder)
    {
        if ($user->can('stakeholder-search-stakeholders-list')) {
            return Response::allow();
        }
    }
}
