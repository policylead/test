<?php

namespace App\Policies;

use App\Models\TaggingTag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class TaggingTagPolicy
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
        if ($user->can('tagging-tag-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  TaggingTag $tagging_tag
     * @return mixed
     */
    public function view(User $user, TaggingTag $tagging_tag)
    {
        if ($user->can('tagging-tag-view')) {
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
        if ($user->can('tagging-tag-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  TaggingTag $tagging_tag
     * @return mixed
     */
    public function update(User $user, TaggingTag $tagging_tag)
    {
        if ($user->can('tagging-tag-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  TaggingTag $tagging_tag
     * @return mixed
     */
    public function delete(User $user, TaggingTag $tagging_tag)
    {
        if ($user->can('tagging-tag-destroy')) {
            return Response::allow();
        }
    }
}
