<?php

namespace App\Http\Resources\NewsletterSubscription;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ReportTemplate\ReportTemplateResource;
use App\Http\Resources\ReportsMailingList\ReportsMailingListResource;

class NewsletterSubscriptionResource extends JsonResource
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
                'reportTemplate' => new ReportTemplateResource($this->whenLoaded('reportTemplate')),
                'reportsMailingList' => new ReportsMailingListResource($this->whenLoaded('reportsMailingList')),
            ]
        );
    }
}
