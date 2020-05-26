<?php

namespace App\Policies;

use App\Models\SentEmailAlert;
use App\Models\TaggingTagged;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SentEmailAlertPolicy
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
        if ($user->can('sent-email-alert-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  SentEmailAlert $sent_email_alert
     * @return mixed
     */
    public function view(User $user, SentEmailAlert $sent_email_alert)
    {
        if ($user->can('sent-email-alert-view')) {
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
        if ($user->can('sent-email-alert-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  SentEmailAlert $sent_email_alert
     * @return mixed
     */
    public function update(User $user, SentEmailAlert $sent_email_alert)
    {
        if ($user->can('sent-email-alert-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  SentEmailAlert $sent_email_alert
     * @return mixed
     */
    public function delete(User $user, SentEmailAlert $sent_email_alert)
    {
        if ($user->can('sent-email-alert-destroy')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can search relation.
     *
     * @param  User  $user
     * @param  SentEmailAlert $sent_email_alert
     * @return mixed
     */
    public function searchTaggingTaggeds(User $user, SentEmailAlert $sent_email_alert)
    {
        if ($user->can('sent-email-alert-search-tagging-taggeds')) {
            return Response::allow();
        }
    }
}
