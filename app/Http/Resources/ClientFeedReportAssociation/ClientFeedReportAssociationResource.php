<?php

namespace App\Http\Resources\ClientFeedReportAssociation;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ClientFeed\ClientFeedResource;
use App\Http\Resources\Report\ReportResource;

class ClientFeedReportAssociationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return  array_merge(
            parent::toArray($request),
            [
                /**
                 * Resources that can be included if requested.
                 */
                'clientFeed' => new ClientFeedResource($this->whenLoaded('clientFeed')),
                'report' => new ReportResource($this->whenLoaded('report')),
            ]
        );
    }
}
