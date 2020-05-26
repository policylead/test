<?php

namespace App\Policies;

use App\Models\StakeholdersDatum;
use App\Models\StakeholdersList;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class StakeholdersDatumPolicy
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
        if ($user->can('stakeholder-data-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  StakeholdersDatum $stakeholders_datum
     * @return mixed
     */
    public function view(User $user, StakeholdersDatum $stakeholders_datum)
    {
        if ($user->can('stakeholder-data-view')) {
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
        if ($user->can('stakeholder-data-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  StakeholdersDatum $stakeholders_datum
     * @return mixed
     */
    public function update(User $user, StakeholdersDatum $stakeholders_datum)
    {
        if ($user->can('stakeholder-data-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  StakeholdersDatum $stakeholders_datum
     * @return mixed
     */
    public function delete(User $user, StakeholdersDatum $stakeholders_datum)
    {
        if ($user->can('stakeholder-data-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  StakeholdersDatum $stakeholders_datum
     * @return mixed
     */
    public function searchStakeholdersLists(User $user, StakeholdersDatum $stakeholders_datum)
    {
        if ($user->can('stakeholder-data-search-stakeholders-lists')) {
            return Response::allow();
        }
    }
}
