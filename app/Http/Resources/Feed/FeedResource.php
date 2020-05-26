<?php

namespace App\Http\Resources\Feed;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Provider\ProviderResource;
use App\Http\Resources\FeedsManual\FeedsManualCollection;
use App\Http\Resources\RssSubscription\RssSubscriptionCollection;

class FeedResource extends JsonResource
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
                'provider' => new ProviderResource($this->whenLoaded('provider')),
                'feedsManuals' => new FeedsManualCollection($this->whenLoaded('feedsManuals')),
                'rssSubscriptions' => new RssSubscriptionCollection($this->whenLoaded('rssSubscriptions')),
            ]
        );
    }
}
