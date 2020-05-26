<?php

namespace App\Http\Resources\ClientFeedReportAssociation;

use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientFeedReportAssociationCollection extends ResourceCollection
{
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = ClientFeedReportAssociationResource::class;
}
