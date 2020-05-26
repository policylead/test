<?php

namespace App\Policies;

use App\Models\DocumentsTemp;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DocumentsTempPolicy
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
        if ($user->can('document-temp-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  DocumentsTemp $documents_temp
     * @return mixed
     */
    public function view(User $user, DocumentsTemp $documents_temp)
    {
        if ($user->can('document-temp-view')) {
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
        if ($user->can('document-temp-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  DocumentsTemp $documents_temp
     * @return mixed
     */
    public function update(User $user, DocumentsTemp $documents_temp)
    {
        if ($user->can('document-temp-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  DocumentsTemp $documents_temp
     * @return mixed
     */
    public function delete(User $user, DocumentsTemp $documents_temp)
    {
        if ($user->can('document-temp-destroy')) {
            return Response::allow();
        }
    }
}
