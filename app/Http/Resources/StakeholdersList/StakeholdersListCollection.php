<?php

namespace App\Http\Resources\StakeholdersList;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StakeholdersListCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = StakeholdersListResource::class;
}
