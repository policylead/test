<?php

namespace App\Http\Resources\DashboardsKeyword;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DashboardsKeywordCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DashboardsKeywordResource::class;
}
