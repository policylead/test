<?php

namespace App\Http\Resources\ReportsCustomDocument;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportsCustomDocumentCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ReportsCustomDocumentResource::class;
}
