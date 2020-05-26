<?php

namespace App\Http\Resources\EventEmailClick;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class EventEmailClickCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = EventEmailClickResource::class;
}
