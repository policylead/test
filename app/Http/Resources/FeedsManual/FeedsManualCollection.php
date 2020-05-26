<?php

namespace App\Http\Resources\FeedsManual;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class FeedsManualCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = FeedsManualResource::class;
}
