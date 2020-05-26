<?php

namespace App\Http\Resources\FeedsManual;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Feed\FeedResource;

class FeedsManualResource extends JsonResource
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
                'feed' => new FeedResource($this->whenLoaded('feed')),
            ]
        );
    }
}
