<?php

namespace App\Http\Resources\SentEmailAlert;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SentEmailAlertCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = SentEmailAlertResource::class;
}
