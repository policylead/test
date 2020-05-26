<?php

namespace App\Http\Resources\DocumentsTemp;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DocumentsTempCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = DocumentsTempResource::class;
}
