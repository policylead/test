<?php

namespace App\Http\Resources\TwitterAccount;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TwitterAccountCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TwitterAccountResource::class;
}
