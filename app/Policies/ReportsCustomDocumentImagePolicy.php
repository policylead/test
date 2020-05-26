<?php

namespace App\Policies;

use App\Models\ReportsCustomDocumentImage;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ReportsCustomDocumentImagePolicy
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
        if ($user->can('report-custom-document-image-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocumentImage $reports_custom_document_image
     * @return mixed
     */
    public function view(User $user, ReportsCustomDocumentImage $reports_custom_document_image)
    {
        if ($user->can('report-custom-document-image-view')) {
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
        if ($user->can('report-custom-document-image-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocumentImage $reports_custom_document_image
     * @return mixed
     */
    public function update(User $user, ReportsCustomDocumentImage $reports_custom_document_image)
    {
        if ($user->can('report-custom-document-image-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ReportsCustomDocumentImage $reports_custom_document_image
     * @return mixed
     */
    public function delete(User $user, ReportsCustomDocumentImage $reports_custom_document_image)
    {
        if ($user->can('report-custom-document-image-destroy')) {
            return Response::allow();
        }
    }
}
