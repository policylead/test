<?php

namespace App\Http\Resources\FacebookAccount;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FacebookAccountCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = FacebookAccountResource::class;
}
