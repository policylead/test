<?php

namespace App\Policies;

use App\Models\EventEmailClick;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class EventEmailClickPolicy
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
        if ($user->can('event-email-click-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  EventEmailClick $event_email_click
     * @return mixed
     */
    public function view(User $user, EventEmailClick $event_email_click)
    {
        if ($user->can('event-email-click-view')) {
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
        if ($user->can('event-email-click-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  EventEmailClick $event_email_click
     * @return mixed
     */
    public function update(User $user, EventEmailClick $event_email_click)
    {
        if ($user->id == $event_email_click->user_id) {
            return Response::allow();
        }
        if ($user->can('event-email-click-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  EventEmailClick $event_email_click
     * @return mixed
     */
    public function delete(User $user, EventEmailClick $event_email_click)
    {
        if ($user->id == $event_email_click->user_id) {
            return Response::allow();
        }
        if ($user->can('event-email-click-destroy')) {
            return Response::allow();
        }
    }
}
