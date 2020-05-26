<?php

namespace App\Http\Resources\ReportsScheduled;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportsScheduledCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ReportsScheduledResource::class;
}
