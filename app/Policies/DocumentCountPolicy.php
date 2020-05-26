<?php

namespace App\Policies;

use App\Models\DocumentCount;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DocumentCountPolicy
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
        if ($user->can('document-count-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  DocumentCount $document_count
     * @return mixed
     */
    public function view(User $user, DocumentCount $document_count)
    {
        if ($user->can('document-count-view')) {
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
        if ($user->can('document-count-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  DocumentCount $document_count
     * @return mixed
     */
    public function update(User $user, DocumentCount $document_count)
    {
        if ($user->id == $document_count->user_id) {
            return Response::allow();
        }
        if ($user->can('document-count-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  DocumentCount $document_count
     * @return mixed
     */
    public function delete(User $user, DocumentCount $document_count)
    {
        if ($user->id == $document_count->user_id) {
            return Response::allow();
        }
        if ($user->can('document-count-destroy')) {
            return Response::allow();
        }
    }
}
