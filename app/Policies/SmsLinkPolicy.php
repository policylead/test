<?php

namespace App\Policies;

use App\Models\SmsLink;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SmsLinkPolicy
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
        if ($user->can('sm-link-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  SmsLink $sms_link
     * @return mixed
     */
    public function view(User $user, SmsLink $sms_link)
    {
        if ($user->can('sm-link-view')) {
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
        if ($user->can('sm-link-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  SmsLink $sms_link
     * @return mixed
     */
    public function update(User $user, SmsLink $sms_link)
    {
        if ($user->can('sm-link-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  SmsLink $sms_link
     * @return mixed
     */
    public function delete(User $user, SmsLink $sms_link)
    {
        if ($user->can('sm-link-destroy')) {
            return Response::allow();
        }
    }
}
