<?php

namespace App\Policies;

use App\Models\TaggingTagged;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaggingTaggedPolicy
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
        if ($user->can('tagging-tagged-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  TaggingTagged $tagging_tagged
     * @return mixed
     */
    public function view(User $user, TaggingTagged $tagging_tagged)
    {
        if ($user->can('tagging-tagged-view')) {
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
        if ($user->can('tagging-tagged-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  TaggingTagged $tagging_tagged
     * @return mixed
     */
    public function update(User $user, TaggingTagged $tagging_tagged)
    {
        if ($user->can('tagging-tagged-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  TaggingTagged $tagging_tagged
     * @return mixed
     */
    public function delete(User $user, TaggingTagged $tagging_tagged)
    {
        if ($user->can('tagging-tagged-destroy')) {
            return Response::allow();
        }
    }
}
