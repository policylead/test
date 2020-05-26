<?php

namespace App\Policies;

use App\Models\SentEventAlert;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SentEventAlertPolicy
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
        if ($user->can('sent-event-alert-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  SentEventAlert $sent_event_alert
     * @return mixed
     */
    public function view(User $user, SentEventAlert $sent_event_alert)
    {
        if ($user->can('sent-event-alert-view')) {
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
        if ($user->can('sent-event-alert-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  SentEventAlert $sent_event_alert
     * @return mixed
     */
    public function update(User $user, SentEventAlert $sent_event_alert)
    {
        if ($user->id == $sent_event_alert->user_id) {
            return Response::allow();
        }
        if ($user->can('sent-event-alert-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  SentEventAlert $sent_event_alert
     * @return mixed
     */
    public function delete(User $user, SentEventAlert $sent_event_alert)
    {
        if ($user->id == $sent_event_alert->user_id) {
            return Response::allow();
        }
        if ($user->can('sent-event-alert-destroy')) {
            return Response::allow();
        }
    }
}
