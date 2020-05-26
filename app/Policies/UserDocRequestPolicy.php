<?php

namespace App\Policies;

use App\Models\UserDocRequest;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class UserDocRequestPolicy
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
        if ($user->can('user-doc-request-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  UserDocRequest $user_doc_request
     * @return mixed
     */
    public function view(User $user, UserDocRequest $user_doc_request)
    {
        if ($user->can('user-doc-request-view')) {
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
        if ($user->can('user-doc-request-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  UserDocRequest $user_doc_request
     * @return mixed
     */
    public function update(User $user, UserDocRequest $user_doc_request)
    {
        if ($user->id == $user_doc_request->user_id) {
            return Response::allow();
        }
        if ($user->can('user-doc-request-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  UserDocRequest $user_doc_request
     * @return mixed
     */
    public function delete(User $user, UserDocRequest $user_doc_request)
    {
        if ($user->id == $user_doc_request->user_id) {
            return Response::allow();
        }
        if ($user->can('user-doc-request-destroy')) {
            return Response::allow();
        }
    }
}
