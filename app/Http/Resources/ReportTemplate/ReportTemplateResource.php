<?php

namespace App\Http\Resources\ReportTemplate;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\NewsletterSubscription\NewsletterSubscriptionCollection;
use App\Http\Resources\Report\ReportCollection;

class ReportTemplateResource extends JsonResource
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
                'newsletterSubscriptions' => new NewsletterSubscriptionCollection($this->whenLoaded('newsletterSubscriptions')),
                'reports' => new ReportCollection($this->whenLoaded('reports')),
            ]
        );
    }
}
