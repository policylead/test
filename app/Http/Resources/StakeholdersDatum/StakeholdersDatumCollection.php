<?php

namespace App\Http\Resources\StakeholdersDatum;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StakeholdersDatumCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = StakeholdersDatumResource::class;
}
