<?php

namespace App\Http\Resources\SubjectArea;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SubjectAreaCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = SubjectAreaResource::class;
}
