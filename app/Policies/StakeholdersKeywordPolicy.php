<?php

namespace App\Policies;

use App\Models\StakeholdersKeyword;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StakeholdersKeywordPolicy
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
        if ($user->can('stakeholder-keyword-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  StakeholdersKeyword $stakeholders_keyword
     * @return mixed
     */
    public function view(User $user, StakeholdersKeyword $stakeholders_keyword)
    {
        if ($user->can('stakeholder-keyword-view')) {
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
        if ($user->can('stakeholder-keyword-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  StakeholdersKeyword $stakeholders_keyword
     * @return mixed
     */
    public function update(User $user, StakeholdersKeyword $stakeholders_keyword)
    {
        if ($user->can('stakeholder-keyword-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  StakeholdersKeyword $stakeholders_keyword
     * @return mixed
     */
    public function delete(User $user, StakeholdersKeyword $stakeholders_keyword)
    {
        if ($user->can('stakeholder-keyword-destroy')) {
            return Response::allow();
        }
    }
}
