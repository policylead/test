<?php

namespace App\Http\Resources\SentEventAlert;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SentEventAlertCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = SentEventAlertResource::class;
}
