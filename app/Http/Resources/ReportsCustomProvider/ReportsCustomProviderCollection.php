<?php

namespace App\Http\Resources\ReportsCustomProvider;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportsCustomProviderCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ReportsCustomProviderResource::class;
}
