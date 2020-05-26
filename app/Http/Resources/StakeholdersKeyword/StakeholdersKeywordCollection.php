<?php

namespace App\Http\Resources\StakeholdersKeyword;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StakeholdersKeywordCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = StakeholdersKeywordResource::class;
}
