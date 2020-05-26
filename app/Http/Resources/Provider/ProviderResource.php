<?php

namespace App\Http\Resources\Provider;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Document\DocumentCollection;
use App\Http\Resources\Feed\FeedCollection;

class ProviderResource extends JsonResource
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
                'documents' => new DocumentCollection($this->whenLoaded('documents')),
                'feeds' => new FeedCollection($this->whenLoaded('feeds')),
            ]
        );
    }
}
