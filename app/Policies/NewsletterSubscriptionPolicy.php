<?php

namespace App\Policies;

use App\Models\NewsletterSubscription;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class NewsletterSubscriptionPolicy
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
        if ($user->can('newsletter-subscription-view-all')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  User  $user
     * @param  NewsletterSubscription $newsletter_subscription
     * @return mixed
     */
    public function view(User $user, NewsletterSubscription $newsletter_subscription)
    {
        if ($user->can('newsletter-subscription-view')) {
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
        if ($user->can('newsletter-subscription-store')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  User  $user
     * @param  NewsletterSubscription $newsletter_subscription
     * @return mixed
     */
    public function update(User $user, NewsletterSubscription $newsletter_subscription)
    {
        if ($user->can('newsletter-subscription-update')) {
            return Response::allow();
        }
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  User  $user
     * @param  NewsletterSubscription $newsletter_subscription
     * @return mixed
     */
    public function delete(User $user, NewsletterSubscription $newsletter_subscription)
    {
        if ($user->can('newsletter-subscription-destroy')) {
            return Response::allow();
        }
    }
}
