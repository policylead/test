<?php

namespace App\Http\Resources\RssSubscription;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RssSubscriptionCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = RssSubscriptionResource::class;
}
