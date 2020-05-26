<?php

namespace App\Http\Resources\FeedsDuplicate;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedsDuplicateCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = FeedsDuplicateResource::class;
}
