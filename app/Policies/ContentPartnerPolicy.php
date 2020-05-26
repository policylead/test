<?php

namespace App\Policies;

use App\Models\ContentPartner;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ContentPartnerPolicy
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
        if ($user->can('content-partner-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  ContentPartner $content_partner
     * @return mixed
     */
    public function view(User $user, ContentPartner $content_partner)
    {
        if ($user->can('content-partner-view')) {
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
        if ($user->can('content-partner-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  ContentPartner $content_partner
     * @return mixed
     */
    public function update(User $user, ContentPartner $content_partner)
    {
        if ($user->id == $content_partner->user_id) {
            return Response::allow();
        }
        if ($user->can('content-partner-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  ContentPartner $content_partner
     * @return mixed
     */
    public function delete(User $user, ContentPartner $content_partner)
    {
        if ($user->id == $content_partner->user_id) {
            return Response::allow();
        }
        if ($user->can('content-partner-destroy')) {
            return Response::allow();
        }
    }
}
