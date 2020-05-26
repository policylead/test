<?php

namespace App\Http\Resources\TaggingTagged;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TaggingTaggedCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = TaggingTaggedResource::class;
}
