<?php

namespace App\Policies;

use App\Models\ReportsCustomDocument;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsCustomDocumentPolicy
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
        if ($user->can('report-custom-document-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocument $reports_custom_document
     * @return mixed
     */
    public function view(User $user, ReportsCustomDocument $reports_custom_document)
    {
        if ($user->can('report-custom-document-view')) {
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
        if ($user->can('report-custom-document-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocument $reports_custom_document
     * @return mixed
     */
    public function update(User $user, ReportsCustomDocument $reports_custom_document)
    {
        if ($user->id == $reports_custom_document->user_id) {
            return Response::allow();
        }
        if ($user->can('report-custom-document-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocument $reports_custom_document
     * @return mixed
     */
    public function delete(User $user, ReportsCustomDocument $reports_custom_document)
    {
        if ($user->id == $reports_custom_document->user_id) {
            return Response::allow();
        }
        if ($user->can('report-custom-document-destroy')) {
            return Response::allow();
        }
    }
}
