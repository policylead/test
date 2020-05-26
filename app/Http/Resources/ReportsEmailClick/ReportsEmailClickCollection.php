<?php

namespace App\Http\Resources\ReportsEmailClick;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportsEmailClickCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ReportsEmailClickResource::class;
}
