<?php

namespace App\Policies;

use App\Models\DocumentsComment;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class DocumentsCommentPolicy
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
        if ($user->can('document-comment-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  DocumentsComment $documents_comment
     * @return mixed
     */
    public function view(User $user, DocumentsComment $documents_comment)
    {
        if ($user->can('document-comment-view')) {
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
        if ($user->can('document-comment-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  DocumentsComment $documents_comment
     * @return mixed
     */
    public function update(User $user, DocumentsComment $documents_comment)
    {
        if ($user->id == $documents_comment->user_id) {
            return Response::allow();
        }
        if ($user->can('document-comment-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  DocumentsComment $documents_comment
     * @return mixed
     */
    public function delete(User $user, DocumentsComment $documents_comment)
    {
        if ($user->id == $documents_comment->user_id) {
            return Response::allow();
        }
        if ($user->can('document-comment-destroy')) {
            return Response::allow();
        }
    }
}
