<?php

namespace App\Http\Resources\ReportsCustomDocumentImage;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReportsCustomDocumentImageCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ReportsCustomDocumentImageResource::class;
}
